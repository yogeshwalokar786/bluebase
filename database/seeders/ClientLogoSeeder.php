<?php

namespace Database\Seeders;

use App\Models\ClientLogo;
use Illuminate\Database\Seeder;

class ClientLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logos = [
            [
                'name' => 'Aarohi Classic Championship',
                'logo_path' => 'images/clients/aarohi-logo.webp',
                'website_url' => null,
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Aarya Waste Innovations',
                'logo_path' => 'images/clients/aarya-logo.webp',
                'website_url' => null,
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Austin Moto Premium',
                'logo_path' => 'images/clients/austin-logo.webp',
                'website_url' => null,
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Diets by Dietitian',
                'logo_path' => 'images/clients/diets-logo.webp',
                'website_url' => null,
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Dreamland Vacations',
                'logo_path' => 'images/clients/dream-logo.webp',
                'website_url' => null,
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'OMG Rental Bikes',
                'logo_path' => 'images/clients/omg-logo.webp',
                'website_url' => null,
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Rednetik',
                'logo_path' => 'images/clients/rednetik-logo.webp',
                'website_url' => null,
                'display_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Shinne Interior',
                'logo_path' => 'images/clients/shine-interior-logo.png',
                'website_url' => null,
                'display_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'Shristiyam',
                'logo_path' => 'images/clients/shristiyam_logo.webp',
                'website_url' => null,
                'display_order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'Trevanta International',
                'logo_path' => 'images/clients/trevanta_logo.webp',
                'website_url' => null,
                'display_order' => 10,
                'is_active' => true,
            ],
        ];

        foreach ($logos as $logo) {
            ClientLogo::updateOrCreate(
                ['name' => $logo['name']],
                $logo
            );
        }
    }
}

