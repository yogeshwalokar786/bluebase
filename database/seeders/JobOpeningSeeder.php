<?php

namespace Database\Seeders;

use App\Models\JobOpening;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobOpeningSeeder extends Seeder
{
    public function run(): void
    {
        // No default job openings seeded; manage postings via Admin Panel.
        $openings = [];

        foreach ($openings as $opening) {
            JobOpening::updateOrCreate(
                ['slug' => $opening['slug']],
                $opening
            );
        }
    }
}
