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
        if (!Schema::hasTable('job_openings')) {
            Schema::create('job_openings', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('department')->default('Engineering');
                $table->string('category')->default('backend'); // backend, ai, mobile-cloud, design
                $table->string('location')->default('Remote (India / Global)');
                $table->string('type')->default('Full-time');
                $table->string('experience')->nullable()->default('Senior (3+ yrs)');
                $table->text('description')->nullable();
                $table->text('skills_tags')->nullable(); // Comma-separated: "React, Go, PostgreSQL"
                $table->string('apply_email')->nullable()->default('info@bluebasetechnologies.com');
                $table->integer('display_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
