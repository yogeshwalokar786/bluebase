<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $map = [
            'why-relying-only-on-instagram-facebook-is-risky-for-business' => 'images/blogs/social-media-vs-owned-website.jpg',
            'stop-wasting-money-on-boost-post-get-real-whatsapp-inquiries' => 'images/blogs/whatsapp-meta-ads-leads.jpg',
            'business-trapped-in-excel-whatsapp-how-custom-software-saves-hours' => 'images/blogs/excel-to-custom-software.jpg',
            'how-local-businesses-rank-on-google-maps-get-daily-calls' => 'images/blogs/google-maps-local-seo.jpg',
            'how-much-business-website-cost-transparent-guide' => 'images/blogs/website-cost-pricing-guide.jpg',
            'why-websites-stop-working-guide-to-website-maintenance-for-business-owners' => 'images/blogs/website-maintenance-security.jpg',
            'case-study-how-omg-rental-bikes-automated-fleet-operations-scaled-400-percent' => 'images/blogs/bike-rental-fleet-automation.jpg',
        ];

        foreach ($map as $slug => $img) {
            DB::table('blogs')
                ->where('slug', $slug)
                ->update([
                    'image' => $img,
                    'og_image' => $img
                ]);
        }
    }

    public function down(): void
    {
    }
};
