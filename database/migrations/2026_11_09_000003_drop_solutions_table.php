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
        Schema::dropIfExists('solutions');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('badge')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->json('features')->nullable();
            $table->json('metrics')->nullable();
            $table->json('tech_stack')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
};
