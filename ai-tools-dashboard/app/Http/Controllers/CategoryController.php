<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('aiTools')->get();
        return view('categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $tools = $category->aiTools()
            ->where('is_active', true)
            ->orderBy('popularity', 'desc')
            ->paginate(12);

        return view('categories.show', compact('category', 'tools'));
    }
}
