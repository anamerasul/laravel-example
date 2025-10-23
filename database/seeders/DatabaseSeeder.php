<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Service::query()->delete();
        Service::insert([
            [
                'name' => 'Web Design',
                'slug' => 'web-design',
                'short_description' => 'Modern, responsive designs focused on conversions.',
                'description' => 'We craft clean, accessible designs that elevate your brand and drive engagement.',
                'price_min' => 500,
                'price_max' => 2500,
                'is_featured' => true,
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'short_description' => 'Fast, scalable builds with best practices.',
                'description' => 'From landing pages to full-stack apps, we ship performant, maintainable code.',
                'price_min' => 800,
                'price_max' => 5000,
                'is_featured' => true,
            ],
            [
                'name' => 'SEO Services',
                'slug' => 'seo-services',
                'short_description' => 'On-page optimizations and content strategy to rank higher.',
                'description' => 'Technical SEO audits, keyword strategy, and content optimization that improve visibility.',
                'price_min' => 300,
                'price_max' => 2000,
                'is_featured' => true,
            ],
        ]);
    }
}
