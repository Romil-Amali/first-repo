@extends('layouts.app')

@section('title', $tool->name . ' - AI Tools Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <div class="flex items-start mb-6">
            <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center text-white font-bold text-3xl mr-6">
                {{ substr($tool->name, 0, 1) }}
            </div>
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $tool->name }}</h1>
                <div class="flex items-center space-x-4 mb-4">
                    <a href="{{ route('categories.show', $tool->category->slug) }}" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 hover:bg-blue-200">
                        {{ $tool->category->name }}
                    </a>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        @if($tool->pricing == 'free') bg-green-100 text-green-800
                        @elseif($tool->pricing == 'freemium') bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($tool->pricing) }}
                    </span>
                    <span class="text-gray-600">Popularitas: {{ $tool->popularity }}/100</span>
                </div>
                <a href="{{ $tool->url }}" target="_blank" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">
                    Visit Website
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi</h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $tool->description }}</p>

            @if($tool->features)
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Fitur Utama</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                @foreach($tool->features as $feature)
                <div class="flex items-center space-x-2 bg-gray-50 p-3 rounded-lg">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-gray-700">{{ $feature }}</span>
                </div>
                @endforeach
            </div>
            @endif

            @if($tool->api_endpoint)
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">API Endpoint</h3>
                <code class="text-sm text-blue-700">{{ $tool->api_endpoint }}</code>
            </div>
            @endif
        </div>
    </div>

    @if($relatedTools->count() > 0)
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Tools Serupa</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedTools as $relatedTool)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                            {{ substr($relatedTool->name, 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $relatedTool->name }}</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $relatedTool->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                            @if($relatedTool->pricing == 'free') bg-green-100 text-green-800
                            @elseif($relatedTool->pricing == 'freemium') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($relatedTool->pricing) }}
                        </span>
                        <a href="{{ route('tools.show', $relatedTool->slug) }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
