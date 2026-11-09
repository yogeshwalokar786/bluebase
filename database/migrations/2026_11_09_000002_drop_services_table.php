<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('services');
    }

    public function down(): void
    {
        if (!Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('tagline')->nullable();
                $table->string('icon')->default('code-square');
                $table->text('summary')->nullable();
                $table->longText('description')->nullable();
                $table->json('features')->nullable();
                $table->string('image')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('display_order')->default(0);
                $table->timestamps();
            });
        }
    }
};
