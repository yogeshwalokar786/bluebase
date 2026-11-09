<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('page_seos')) {
            Schema::create('page_seos', function (Blueprint $table) {
                $table->id();
                $table->string('page_name');
                $table->string('route_name')->unique();
                $table->string('url_path');
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->string('meta_keywords')->nullable();
                $table->string('canonical_url')->nullable();
                $table->string('og_image')->nullable();
                $table->string('robots')->default('index, follow');
                $table->string('changefreq')->default('weekly');
                $table->decimal('priority', 2, 1)->default(0.8);
                $table->boolean('is_in_sitemap')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('page_seos');
    }
};

