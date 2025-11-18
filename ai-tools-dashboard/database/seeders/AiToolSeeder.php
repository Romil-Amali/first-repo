<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AiToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'name' => 'ChatGPT',
                'slug' => 'chatgpt',
                'description' => 'AI chatbot canggih dari OpenAI yang dapat membantu dalam berbagai tugas',
                'logo' => '/images/chatgpt.png',
                'url' => 'https://chat.openai.com',
                'api_endpoint' => 'https://api.openai.com/v1',
                'category_id' => 6,
                'is_active' => true,
                'pricing' => 'freemium',
                'features' => ['Natural Language Processing', 'Code Generation', 'Content Writing'],
                'popularity' => 100,
            ],
            [
                'name' => 'Claude',
                'slug' => 'claude',
                'description' => 'AI assistant dari Anthropic dengan kemampuan analisis mendalam',
                'logo' => '/images/claude.png',
                'url' => 'https://claude.ai',
                'api_endpoint' => 'https://api.anthropic.com',
                'category_id' => 6,
                'is_active' => true,
                'pricing' => 'freemium',
                'features' => ['Long Context', 'Document Analysis', 'Code Review'],
                'popularity' => 95,
            ],
            [
                'name' => 'DALL-E 3',
                'slug' => 'dalle-3',
                'description' => 'AI image generator terbaru dari OpenAI',
                'logo' => '/images/dalle.png',
                'url' => 'https://openai.com/dall-e-3',
                'api_endpoint' => 'https://api.openai.com/v1/images',
                'category_id' => 2,
                'is_active' => true,
                'pricing' => 'paid',
                'features' => ['High Quality Images', 'Text to Image', 'Creative Control'],
                'popularity' => 90,
            ],
            [
                'name' => 'Midjourney',
                'slug' => 'midjourney',
                'description' => 'AI art generator untuk membuat gambar berkualitas tinggi',
                'logo' => '/images/midjourney.png',
                'url' => 'https://midjourney.com',
                'api_endpoint' => null,
                'category_id' => 2,
                'is_active' => true,
                'pricing' => 'paid',
                'features' => ['Artistic Style', 'High Resolution', 'Commercial Use'],
                'popularity' => 92,
            ],
            [
                'name' => 'GitHub Copilot',
                'slug' => 'github-copilot',
                'description' => 'AI pair programmer yang membantu menulis code',
                'logo' => '/images/copilot.png',
                'url' => 'https://github.com/features/copilot',
                'api_endpoint' => null,
                'category_id' => 3,
                'is_active' => true,
                'pricing' => 'paid',
                'features' => ['Code Completion', 'Multi Language', 'IDE Integration'],
                'popularity' => 88,
            ],
            [
                'name' => 'Jasper AI',
                'slug' => 'jasper-ai',
                'description' => 'AI content writer untuk marketing dan copywriting',
                'logo' => '/images/jasper.png',
                'url' => 'https://jasper.ai',
                'api_endpoint' => null,
                'category_id' => 1,
                'is_active' => true,
                'pricing' => 'paid',
                'features' => ['SEO Optimization', 'Multiple Templates', 'Brand Voice'],
                'popularity' => 85,
            ],
            [
                'name' => 'Runway ML',
                'slug' => 'runway-ml',
                'description' => 'AI tools untuk video editing dan generation',
                'logo' => '/images/runway.png',
                'url' => 'https://runwayml.com',
                'api_endpoint' => null,
                'category_id' => 4,
                'is_active' => true,
                'pricing' => 'freemium',
                'features' => ['Video Editing', 'Green Screen', 'Motion Tracking'],
                'popularity' => 80,
            ],
            [
                'name' => 'ElevenLabs',
                'slug' => 'elevenlabs',
                'description' => 'AI voice generator dengan suara realistis',
                'logo' => '/images/elevenlabs.png',
                'url' => 'https://elevenlabs.io',
                'api_endpoint' => 'https://api.elevenlabs.io',
                'category_id' => 5,
                'is_active' => true,
                'pricing' => 'freemium',
                'features' => ['Voice Cloning', 'Multiple Languages', 'Natural Sound'],
                'popularity' => 87,
            ],
            [
                'name' => 'Notion AI',
                'slug' => 'notion-ai',
                'description' => 'AI assistant terintegrasi dengan Notion untuk produktivitas',
                'logo' => '/images/notion.png',
                'url' => 'https://notion.so',
                'api_endpoint' => null,
                'category_id' => 8,
                'is_active' => true,
                'pricing' => 'freemium',
                'features' => ['Writing Assistant', 'Summarization', 'Translation'],
                'popularity' => 82,
            ],
            [
                'name' => 'Tableau AI',
                'slug' => 'tableau-ai',
                'description' => 'AI untuk analisis dan visualisasi data',
                'logo' => '/images/tableau.png',
                'url' => 'https://tableau.com',
                'api_endpoint' => null,
                'category_id' => 7,
                'is_active' => true,
                'pricing' => 'paid',
                'features' => ['Data Visualization', 'Predictive Analytics', 'Dashboard'],
                'popularity' => 78,
            ],
        ];

        foreach ($tools as $tool) {
            \App\Models\AiTool::create($tool);
        }
    }
}
