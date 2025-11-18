<?php

namespace App\Http\Controllers;

use App\Models\AiTool;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('aiTools')->get();
        $tools = AiTool::with('category')
            ->where('is_active', true)
            ->orderBy('popularity', 'desc')
            ->get();

        $popularTools = AiTool::with('category')
            ->where('is_active', true)
            ->orderBy('popularity', 'desc')
            ->take(6)
            ->get();

        return view('home', compact('categories', 'tools', 'popularTools'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $categoryId = $request->input('category');

        $tools = AiTool::with('category')
            ->where('is_active', true)
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->when($categoryId, function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->orderBy('popularity', 'desc')
            ->get();

        $categories = Category::all();

        return view('search', compact('tools', 'categories', 'query', 'categoryId'));
    }
}
