<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AI Tools Dashboard - Kelola Tools AI dalam Satu Platform')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                            AI Tools Dashboard
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="border-transparent hover:border-blue-500 text-gray-900 hover:text-blue-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="{{ route('tools.index') }}" class="border-transparent hover:border-blue-500 text-gray-900 hover:text-blue-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            All Tools
                        </a>
                        <a href="{{ route('categories.index') }}" class="border-transparent hover:border-blue-500 text-gray-900 hover:text-blue-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Categories
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <form action="{{ route('search') }}" method="GET" class="flex items-center">
                        <input type="text" name="q" placeholder="Cari AI tools..."
                               class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ request('q') }}">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">AI Tools Dashboard</h3>
                    <p class="text-gray-400">Platform untuk mengelola dan menemukan berbagai AI tools terbaik dalam satu tempat.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                        <li><a href="{{ route('tools.index') }}" class="hover:text-white">All Tools</a></li>
                        <li><a href="{{ route('categories.index') }}" class="hover:text-white">Categories</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <p class="text-gray-400">Email: info@aitools.com</p>
                    <p class="text-gray-400">Website: www.aitools.com</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 AI Tools Dashboard. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
