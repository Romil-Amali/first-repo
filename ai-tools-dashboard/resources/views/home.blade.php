@extends('layouts.app')

@section('title', 'AI Tools Dashboard - Kelola Tools AI dalam Satu Platform')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg shadow-xl p-12 mb-12 text-white">
        <h1 class="text-4xl font-bold mb-4">Temukan AI Tools Terbaik</h1>
        <p class="text-xl mb-6">Kelola dan akses berbagai AI tools dalam satu dashboard yang mudah digunakan</p>
        <form action="{{ route('search') }}" method="GET" class="flex max-w-2xl">
            <input type="text" name="q" placeholder="Cari AI tools seperti ChatGPT, Midjourney, dll..."
                   class="flex-1 px-6 py-3 rounded-l-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500">
            <button type="submit" class="bg-purple-700 hover:bg-purple-800 px-8 py-3 rounded-r-lg font-semibold">
                Cari Sekarang
            </button>
        </form>
    </div>

    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Kategori AI Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="text-4xl mb-3">{{ $category->icon }}</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $category->name }}</h3>
                <p class="text-gray-600 text-sm mb-3">{{ $category->description }}</p>
                <div class="text-blue-600 font-semibold">{{ $category->ai_tools_count }} tools</div>
            </a>
            @endforeach
        </div>
    </section>

    <section class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Tools Terpopuler</h2>
            <a href="{{ route('tools.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                Lihat Semua &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($popularTools as $tool)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                            {{ substr($tool->name, 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $tool->name }}</h3>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $tool->category->name }}
                            </span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $tool->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                            @if($tool->pricing == 'free') bg-green-100 text-green-800
                            @elseif($tool->pricing == 'freemium') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($tool->pricing) }}
                        </span>
                        <a href="{{ route('tools.show', $tool->slug) }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="bg-blue-50 rounded-lg p-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Siap Memulai?</h2>
            <p class="text-xl text-gray-600 mb-6">Jelajahi {{ $tools->count() }} AI tools yang tersedia dan tingkatkan produktivitas Anda</p>
            <a href="{{ route('tools.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg">
                Explore All Tools
            </a>
        </div>
    </section>
</div>
@endsection
