<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Contact Inquiries
        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('phone')->nullable();
            $table->string('service')->nullable();
            $table->text('message');
            $table->string('status')->default('new');
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        // 2. Demo Bookings
        Schema::create('demo_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('company');
            $table->string('phone')->nullable();
            $table->string('job_title')->nullable();
            $table->string('current_erp')->nullable();
            $table->string('interested_product')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // 3. Free Trial Requests
        Schema::create('trial_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('company');
            $table->string('cloud_platform')->nullable();
            $table->string('sap_version')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // 4. Partner Applications
        Schema::create('partner_applications', function (Blueprint $table) {
            $table->id();
            $table->string('partner_type')->nullable();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });

        // 5. Newsletter Subscribers
        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('ip_address')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 6. Dynamic Services Table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->string('icon')->nullable();
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();
        });

        // 7. Dynamic Solutions Table
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->string('icon')->nullable();
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solutions');
        Schema::dropIfExists('services');
        Schema::dropIfExists('newsletter_subscribers');
        Schema::dropIfExists('partner_applications');
        Schema::dropIfExists('trial_requests');
        Schema::dropIfExists('demo_bookings');
        Schema::dropIfExists('contact_inquiries');
    }
};

