@extends('layouts.app')

@section('title', 'Categories - AI Tools Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Kategori AI Tools</h1>
        <p class="text-xl text-gray-600">Browse AI tools berdasarkan kategori</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <a href="{{ route('categories.show', $category->slug) }}" class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
            <div class="p-8">
                <div class="text-6xl mb-4 text-center">{{ $category->icon }}</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 text-center">{{ $category->name }}</h3>
                <p class="text-gray-600 text-center mb-4">{{ $category->description }}</p>
                <div class="text-center">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                        {{ $category->ai_tools_count }} tools tersedia
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
