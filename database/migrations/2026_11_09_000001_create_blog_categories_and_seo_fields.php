<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Create blog_categories table
        if (!Schema::hasTable('blog_categories')) {
            Schema::create('blog_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->integer('display_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 2. Add category_id and rich SEO structure columns to blogs table
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('category');
            }
            if (!Schema::hasColumn('blogs', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('content');
            }
            if (!Schema::hasColumn('blogs', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('blogs', 'meta_keywords')) {
                $table->string('meta_keywords')->nullable()->after('meta_description');
            }
            if (!Schema::hasColumn('blogs', 'focus_keyword')) {
                $table->string('focus_keyword')->nullable()->after('meta_keywords');
            }
            if (!Schema::hasColumn('blogs', 'canonical_url')) {
                $table->string('canonical_url')->nullable()->after('focus_keyword');
            }
            if (!Schema::hasColumn('blogs', 'og_title')) {
                $table->string('og_title')->nullable()->after('canonical_url');
            }
            if (!Schema::hasColumn('blogs', 'og_description')) {
                $table->text('og_description')->nullable()->after('og_title');
            }
            if (!Schema::hasColumn('blogs', 'og_image')) {
                $table->string('og_image')->nullable()->after('og_description');
            }
            if (!Schema::hasColumn('blogs', 'robots')) {
                $table->string('robots')->default('index, follow')->after('og_image');
            }
            if (!Schema::hasColumn('blogs', 'schema_type')) {
                $table->string('schema_type')->default('TechArticle')->after('robots');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $cols = [
                'category_id',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'focus_keyword',
                'canonical_url',
                'og_title',
                'og_description',
                'og_image',
                'robots',
                'schema_type',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('blogs', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        Schema::dropIfExists('blog_categories');
    }
};
