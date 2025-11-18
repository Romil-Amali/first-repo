<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Text Generation',
                'slug' => 'text-generation',
                'description' => 'AI tools untuk menghasilkan teks, artikel, dan konten tertulis',
                'icon' => '📝',
            ],
            [
                'name' => 'Image Generation',
                'slug' => 'image-generation',
                'description' => 'AI tools untuk membuat dan mengedit gambar',
                'icon' => '🎨',
            ],
            [
                'name' => 'Code Assistant',
                'slug' => 'code-assistant',
                'description' => 'AI tools untuk membantu coding dan development',
                'icon' => '💻',
            ],
            [
                'name' => 'Video Generation',
                'slug' => 'video-generation',
                'description' => 'AI tools untuk membuat dan mengedit video',
                'icon' => '🎬',
            ],
            [
                'name' => 'Audio & Music',
                'slug' => 'audio-music',
                'description' => 'AI tools untuk audio, musik, dan voice generation',
                'icon' => '🎵',
            ],
            [
                'name' => 'Chatbots',
                'slug' => 'chatbots',
                'description' => 'AI chatbots dan conversational AI',
                'icon' => '💬',
            ],
            [
                'name' => 'Data Analysis',
                'slug' => 'data-analysis',
                'description' => 'AI tools untuk analisis data dan insights',
                'icon' => '📊',
            ],
            [
                'name' => 'Productivity',
                'slug' => 'productivity',
                'description' => 'AI tools untuk meningkatkan produktivitas',
                'icon' => '⚡',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
