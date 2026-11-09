<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'author_role')) {
                $table->string('author_role')->nullable()->default('Software Architect')->after('author');
            }
            if (!Schema::hasColumn('blogs', 'author_avatar')) {
                $table->string('author_avatar')->nullable()->after('author_role');
            }
            if (!Schema::hasColumn('blogs', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('is_published');
            }
            if (!Schema::hasColumn('blogs', 'tags')) {
                $table->string('tags')->nullable()->after('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $cols = ['author_role', 'author_avatar', 'is_featured', 'tags'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('blogs', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};

