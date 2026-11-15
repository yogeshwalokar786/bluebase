<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('chat_sessions')) {
            Schema::create('chat_sessions', function (Blueprint $table) {
                $table->id();
                $table->string('session_uuid', 64)->unique();
                $table->string('visitor_name', 150)->nullable();
                $table->string('visitor_email', 150)->nullable();
                $table->string('visitor_phone', 50)->nullable();
                $table->string('step', 50)->default('ask_name'); // ask_name, ask_email, conversing
                $table->string('status', 30)->default('active'); // active, closed
                $table->string('ip_address', 60)->nullable();
                $table->text('user_agent')->nullable();
                $table->timestamp('last_message_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('chat_messages')) {
            Schema::create('chat_messages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('chat_session_id')->constrained('chat_sessions')->onDelete('cascade');
                $table->enum('sender', ['user', 'bot'])->default('user');
                $table->text('message');
                $table->json('metadata')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
        Schema::dropIfExists('chat_sessions');
    }
};
