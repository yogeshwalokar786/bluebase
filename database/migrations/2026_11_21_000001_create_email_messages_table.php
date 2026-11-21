<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('email_messages')) {
            Schema::create('email_messages', function (Blueprint $table) {
                $table->id();
                $table->string('folder')->default('inbox'); // inbox, sent, draft, trash
                $table->string('inquiry_type')->nullable(); // contact, demo, trial, partner, direct, imap
                $table->unsignedBigInteger('inquiry_id')->nullable();
                $table->unsignedBigInteger('parent_id')->nullable(); // Thread reference
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
                $table->string('status')->default('received'); // received, sent, delivered, failed, draft
                $table->text('error_message')->nullable();
                $table->string('message_id')->nullable();
                $table->timestamp('sent_at')->nullable();
                $table->timestamps();

                $table->index(['folder', 'is_read']);
                $table->index('parent_id');
                $table->index('sender_email');
                $table->index('recipient_email');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('email_messages');
    }
};
