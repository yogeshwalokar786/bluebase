<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'helpful_count')) {
                $table->unsignedInteger('helpful_count')->default(0)->after('is_featured');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'helpful_count')) {
                $table->dropColumn('helpful_count');
            }
        });
    }
};
