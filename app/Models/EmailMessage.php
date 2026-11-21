<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailMessage extends Model
{
    protected $fillable = [
        'folder',
        'inquiry_type',
        'inquiry_id',
        'parent_id',
        'sender_name',
        'sender_email',
        'recipient_name',
        'recipient_email',
        'cc',
        'bcc',
        'subject',
        'body',
        'attachments',
        'is_read',
        'is_starred',
        'status',
        'error_message',
        'message_id',
        'sent_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_starred' => 'boolean',
        'attachments' => 'array',
        'sent_at' => 'datetime',
    ];

    /**
     * Defensive helper to ensure table exists in dynamic production environments.
     */
    public static function ensureTableExists(): void
    {
        try {
            if (!Schema::hasTable('email_messages')) {
                Schema::create('email_messages', function (Blueprint $table) {
                    $table->id();
                    $table->string('folder')->default('inbox');
                    $table->string('inquiry_type')->nullable();
                    $table->unsignedBigInteger('inquiry_id')->nullable();
                    $table->unsignedBigInteger('parent_id')->nullable();
                    $table->string('sender_name')->nullable();
                    $table->string('sender_email');
                    $table->string('recipient_name')->nullable();
                    $table->string('recipient_email');
                    $table->string('cc')->nullable();
                    $table->string('bcc')->nullable();
                    $table->string('subject');
                    $table->longText('body');
                    $table->json('attachments')->nullable();
                    $table->boolean('is_read')->default(false);
                    $table->boolean('is_starred')->default(false);
                    $table->string('status')->default('received');
                    $table->text('error_message')->nullable();
                    $table->string('message_id')->nullable();
                    $table->timestamp('sent_at')->nullable();
                    $table->timestamps();

                    $table->index(['folder', 'is_read']);
                    $table->index('parent_id');
                    $table->index('sender_email');
                    $table->index('recipient_email');
                });
            } else {
                if (!Schema::hasColumn('email_messages', 'attachments')) {
                    Schema::table('email_messages', function (Blueprint $table) {
                        $table->json('attachments')->nullable()->after('body');
                    });
                }
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('EmailMessage ensureTableExists: ' . $e->getMessage());
        }
    }

    public function parent()
    {
        return $this->belongsTo(EmailMessage::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(EmailMessage::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    /**
     * Get entire conversation chain (root inquiry + all replies).
     */
    public function conversationThread()
    {
        $rootId = $this->parent_id ?: $this->id;
        return static::where('id', $rootId)
            ->orWhere('parent_id', $rootId)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
