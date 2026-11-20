<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('case_studies')) {
            Schema::create('case_studies', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('client_name');
                $table->string('client_logo')->nullable();
                $table->string('industry')->nullable();
                $table->string('service_tag')->nullable();
                $table->string('status_badge')->nullable();
                $table->string('status_color')->default('green'); // green, blue, amber, emerald, purple
                $table->string('metric_chip')->nullable();
                $table->string('hero_image')->nullable();
                $table->json('featured_stats')->nullable();
                $table->json('stats_pills')->nullable();
                $table->text('excerpt')->nullable();
                $table->text('challenge')->nullable();
                $table->text('solution')->nullable();
                $table->text('results')->nullable();
                $table->longText('content')->nullable();
                $table->json('technologies')->nullable();
                $table->text('testimonial_quote')->nullable();
                $table->string('testimonial_author')->nullable();
                $table->string('testimonial_role')->nullable();
                $table->string('project_url')->nullable();
                $table->string('project_url_label')->nullable();
                $table->string('view_blade')->nullable(); // Optional custom blade view path
                $table->integer('display_order')->default(0);
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_published')->default(true);
                $table->timestamp('published_at')->nullable();

                // SEO Metadata
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->string('meta_keywords')->nullable();
                $table->string('canonical_url')->nullable();
                $table->string('og_image')->nullable();

                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
