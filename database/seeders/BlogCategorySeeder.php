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
                'meta_title' => 'Website & Digital Presence Guides | Bluebase Tech',
                'meta_description' => 'Explore practical guides for founders on designing fast websites and converting traffic into customers. Build your digital brand presence today.',
                'display_order' => 1,
            ],
            [
                'name' => 'Business Growth & Marketing',
                'slug' => 'business-growth-marketing',
                'description' => 'Tested strategies on Meta ads, Google Maps rankings, WhatsApp customer acquisition, and generating high-intent local inquiries.',
                'meta_title' => 'Business Growth & Digital Marketing Guides | Bluebase',
                'meta_description' => 'Read actionable strategies on Meta ads, Google Maps rankings, and WhatsApp lead funnels to acquire customers. Scale your business marketing today.',
                'display_order' => 2,
            ],
            [
                'name' => 'Software & Process Automation',
                'slug' => 'software-process-automation',
                'description' => 'How growing businesses replace messy spreadsheets and manual paperwork with simple custom business software and save hours every day.',
                'meta_title' => 'Software & Process Automation Guides | Bluebase Tech',
                'meta_description' => 'Discover how simple custom web portals replace messy spreadsheets and automate repetitive operations. Streamline your business workflows today.',
                'display_order' => 3,
            ],
            [
                'name' => 'Client Success Stories',
                'slug' => 'client-success-stories',
                'description' => 'Real-world journeys and results from businesses we have helped grow with custom websites, digital systems, and targeted marketing funnels.',
                'meta_title' => 'Client Success Stories & Case Studies | Bluebase Tech',
                'meta_description' => 'Explore real-world case studies demonstrating how custom websites, booking engines, and digital tools drive client growth. Read our success stories.',
                'display_order' => 4,
            ],
            [
                'name' => 'Website Care & Support',
                'slug' => 'website-care-support',
                'description' => 'Essential guides on keeping your business website fast, secure, backed up, and protected from costly downtime and lost sales.',
                'meta_title' => 'Website Maintenance & Security Guides | Bluebase Tech',
                'meta_description' => 'Learn why proactive security patches, uptime monitoring, and daily cloud backups protect business revenue from downtime. Review our maintenance tips.',
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
