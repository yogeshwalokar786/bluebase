<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use App\Services\ChatbotEngine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    /**
     * Initialize or resume chat session.
     */
    public function init(Request $request, ChatbotEngine $engine): JsonResponse
    {
        $sessionUuid = $request->input('session_uuid');
        $session = null;

        if ($sessionUuid) {
            $session = ChatSession::where('session_uuid', $sessionUuid)->first();
        }

        if (!$session) {
            $sessionUuid = (string) Str::uuid();
            $session = ChatSession::create([
                'session_uuid' => $sessionUuid,
                'step' => 'ask_name',
                'status' => 'active',
                'ip_address' => $request->ip(),
                'user_agent' => substr((string) $request->userAgent(), 0, 500),
                'last_message_at' => now(),
            ]);

            $greeting = $engine->getInitialGreeting();

            ChatMessage::create([
                'chat_session_id' => $session->id,
                'sender' => 'bot',
                'message' => $greeting['message'],
                'metadata' => [
                    'suggestions' => $greeting['suggestions'] ?? [],
                ],
            ]);
        }

        $messages = $session->messages()->get()->map(function ($msg) {
            return [
                'id' => $msg->id,
                'sender' => $msg->sender,
                'message' => $msg->message,
                'suggestions' => $msg->metadata['suggestions'] ?? [],
                'time' => $msg->created_at ? $msg->created_at->format('h:i A') : '',
            ];
        });

        return response()->json([
            'session_uuid' => $session->session_uuid,
            'step' => $session->step,
            'visitor_name' => $session->visitor_name,
            'visitor_email' => $session->visitor_email,
            'messages' => $messages,
        ]);
    }

    /**
     * Send message from visitor and get bot reply.
     */
    public function sendMessage(Request $request, ChatbotEngine $engine): JsonResponse
    {
        $validated = $request->validate([
            'session_uuid' => 'required|string|max:64',
            'message' => 'required|string|max:2000',
        ]);

        $session = ChatSession::where('session_uuid', $validated['session_uuid'])->first();

        if (!$session) {
            $session = ChatSession::create([
                'session_uuid' => $validated['session_uuid'],
                'step' => 'ask_name',
                'status' => 'active',
                'ip_address' => $request->ip(),
                'user_agent' => substr((string) $request->userAgent(), 0, 500),
                'last_message_at' => now(),
            ]);
        }

        $userText = trim($validated['message']);

        // 1. Record User Message
        $userMsg = ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender' => 'user',
            'message' => $userText,
        ]);

        // 2. Process via Local Rule-based AI Engine
        $result = $engine->process($session, $userText);

        // 3. Record Bot Reply
        $botMsg = ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender' => 'bot',
            'message' => $result['message'],
            'metadata' => [
                'suggestions' => $result['suggestions'] ?? [],
            ],
        ]);

        // 4. Update session timestamp
        $session->last_message_at = now();
        $session->save();

        return response()->json([
            'success' => true,
            'reply' => $result['message'],
            'step' => $result['step'],
            'suggestions' => $result['suggestions'] ?? [],
            'visitor_name' => $session->visitor_name,
            'visitor_email' => $session->visitor_email,
            'time' => $botMsg->created_at->format('h:i A'),
        ]);
    }
}
