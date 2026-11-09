<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Case Studies & Blog Posts Table
        if (!Schema::hasTable('blogs')) {
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('category')->default('Engineering');
                $table->string('author')->default('Bluebase Engineering');
                $table->string('read_time')->default('5 min read');
                $table->string('image')->nullable();
                $table->text('excerpt')->nullable();
                $table->longText('content')->nullable();
                $table->boolean('is_published')->default(true);
                $table->timestamp('published_at')->nullable();
                $table->timestamps();
            });
        }

        // 2. Site Settings Table (Key-Value)
        if (!Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->text('value')->nullable();
                $table->string('group')->default('general');
                $table->timestamps();
            });
        }

        // 3. Testimonials / Client Quotes Table
        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('client_name');
                $table->string('client_role')->nullable();
                $table->string('company_name')->nullable();
                $table->text('quote');
                $table->integer('rating')->default(5);
                $table->string('avatar')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('display_order')->default(0);
                $table->timestamps();
            });
        }

        // 4. Enhancements to existing tables
        Schema::table('contact_inquiries', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_inquiries', 'admin_notes')) {
                $table->text('admin_notes')->nullable()->after('status');
            }
        });

        Schema::table('demo_bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('demo_bookings', 'admin_notes')) {
                $table->text('admin_notes')->nullable()->after('status');
            }
        });

        Schema::table('trial_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('trial_requests', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (!Schema::hasColumn('trial_requests', 'admin_notes')) {
                $table->text('admin_notes')->nullable()->after('status');
            }
        });

        Schema::table('partner_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('partner_applications', 'admin_notes')) {
                $table->text('admin_notes')->nullable()->after('status');
            }
        });

        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('features');
            }
            if (!Schema::hasColumn('services', 'display_order')) {
                $table->integer('display_order')->default(0)->after('is_active');
            }
        });

        Schema::table('solutions', function (Blueprint $table) {
            if (!Schema::hasColumn('solutions', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('features');
            }
            if (!Schema::hasColumn('solutions', 'display_order')) {
                $table->integer('display_order')->default(0)->after('is_active');
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('blogs');

        Schema::table('solutions', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'display_order']);
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'display_order']);
        });
        Schema::table('partner_applications', function (Blueprint $table) {
            $table->dropColumn('admin_notes');
        });
        Schema::table('trial_requests', function (Blueprint $table) {
            $table->dropColumn(['phone', 'admin_notes']);
        });
        Schema::table('demo_bookings', function (Blueprint $table) {
            $table->dropColumn('admin_notes');
        });
        Schema::table('contact_inquiries', function (Blueprint $table) {
            $table->dropColumn('admin_notes');
        });
    }
};

