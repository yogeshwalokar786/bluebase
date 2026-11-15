<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $table = 'page_seos';

    protected $fillable = [
        'page_name',
        'route_name',
        'url_path',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_image',
        'robots',
        'changefreq',
        'priority',
        'is_in_sitemap',
    ];

    protected $casts = [
        'is_in_sitemap' => 'boolean',
        'priority' => 'float',
    ];

    public static function forRoute(string $routeName, ?string $defaultTitle = null, ?string $defaultDesc = null)
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('page_seos')) {
                $seo = static::where('route_name', $routeName)->first();
                if ($seo) {
                    return $seo;
                }
            }
        } catch (\Throwable $e) {
            // Table does not exist or not migrated
        }

        return (object)[
            'page_name' => $defaultTitle ?? 'Bluebase',
            'meta_title' => $defaultTitle ? "{$defaultTitle} | Bluebase" : 'Bluebase Technologies | Digital Engineering & Autonomous AI Services',
            'meta_description' => $defaultDesc ?? 'Bluebase is an elite digital engineering and autonomous AI services platform building cloud-native architectures, AI copilots, and enterprise web & mobile products.',
            'meta_keywords' => 'digital engineering, AI agents, enterprise mobility, SAP integration, cloud architecture',
            'canonical_url' => url()->current(),
            'og_image' => 'images/stories/omg-rental-bikes-brand.png',
            'robots' => 'index, follow',
            'changefreq' => 'weekly',
            'priority' => 0.8,
            'is_in_sitemap' => true,
        ];
    }
}

