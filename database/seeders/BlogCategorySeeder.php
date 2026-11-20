<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Websites & Digital Presence',
                'slug' => 'websites-digital-presence',
                'description' => 'Practical advice on building modern, mobile-friendly business websites, landing pages, and turning online visitors into paying customers.',
                'meta_title' => 'Websites & Digital Presence for Growing Businesses — Bluebase Guide',
                'meta_description' => 'Clear, non-technical guides for business owners on creating fast, professional websites and building an authoritative online presence.',
                'display_order' => 1,
            ],
            [
                'name' => 'Business Growth & Marketing',
                'slug' => 'business-growth-marketing',
                'description' => 'Tested strategies on Meta ads, Google Maps rankings, WhatsApp customer acquisition, and generating high-intent local inquiries.',
                'meta_title' => 'Business Growth, Meta Ads & Local Customer Acquisition — Bluebase Guide',
                'meta_description' => 'Learn how local and growing businesses generate consistent inquiries with targeted Meta advertising, Google Business Profile ranking, and WhatsApp funnels.',
                'display_order' => 2,
            ],
            [
                'name' => 'Software & Process Automation',
                'slug' => 'software-process-automation',
                'description' => 'How growing businesses replace messy spreadsheets and manual paperwork with simple custom business software and save hours every day.',
                'meta_title' => 'Business Software & Process Automation for Founders — Bluebase Guide',
                'meta_description' => 'Simple, jargon-free guides on automating daily operations, booking portals, paperless customer agreements, and custom business portals.',
                'display_order' => 3,
            ],
            [
                'name' => 'Client Success Stories',
                'slug' => 'client-success-stories',
                'description' => 'Real-world journeys and results from businesses we have helped grow with custom websites, digital systems, and targeted marketing funnels.',
                'meta_title' => 'Real Client Stories & Business Transformations — Bluebase Technologies',
                'meta_description' => 'Read how real companies like OMG Rental Bikes and Aarohi Classic scaled their operations and grew revenue with Bluebase.',
                'display_order' => 4,
            ],
            [
                'name' => 'Website Care & Support',
                'slug' => 'website-care-support',
                'description' => 'Essential guides on keeping your business website fast, secure, backed up, and protected from costly downtime and lost sales.',
                'meta_title' => 'Website Maintenance, Security & Uptime for Business Owners — Bluebase Guide',
                'meta_description' => 'Understand why regular website maintenance, cloud backups, and uptime monitoring protect your digital sales and brand reputation.',
                'display_order' => 5,
            ],
        ];

        foreach ($categories as $cat) {
            $created = BlogCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );

            // Match and link existing blogs to this category
            Blog::where(function ($q) use ($cat) {
                $q->where('category', 'like', "%{$cat['name']}%")
                  ->orWhere('category', 'like', '%' . explode(' ', $cat['name'])[0] . '%');
            })->whereNull('category_id')->update(['category_id' => $created->id]);
        }
    }
}
