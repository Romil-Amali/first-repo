@extends('layouts.app')

@section('title', 'Search Results - AI Tools Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            @if($query)
                Hasil Pencarian: "{{ $query }}"
            @else
                Semua AI Tools
            @endif
        </h1>
        <p class="text-xl text-gray-600">Ditemukan {{ $tools->count() }} tools</p>
    </div>

    <div class="mb-8 bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="q" class="block text-sm font-medium text-gray-700 mb-2">Cari Tools</label>
                    <input type="text" name="q" id="q" value="{{ $query }}"
                           placeholder="Nama atau deskripsi tools..."
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" id="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $categoryId == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold">
                    Filter
                </button>
                <a href="{{ route('search') }}" class="ml-4 text-gray-600 hover:text-gray-700">
                    Reset Filter
                </a>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tools as $tool)
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
                <p class="text-gray-600 mb-4 line-clamp-3">{{ $tool->description }}</p>

                @if($tool->features)
                <div class="mb-4">
                    <div class="flex flex-wrap gap-2">
                        @foreach(array_slice($tool->features, 0, 3) as $feature)
                        <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-700">
                            {{ $feature }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                        @if($tool->pricing == 'free') bg-green-100 text-green-800
                        @elseif($tool->pricing == 'freemium') bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($tool->pricing) }}
                    </span>
                    <div class="flex space-x-2">
                        <a href="{{ $tool->url }}" target="_blank" class="text-gray-600 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                        <a href="{{ route('tools.show', $tool->slug) }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 bg-white rounded-lg shadow-md">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <h3 class="mt-4 text-xl font-semibold text-gray-900">Tidak ada hasil</h3>
            <p class="mt-2 text-gray-600">Coba gunakan kata kunci lain atau ubah filter kategori.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
