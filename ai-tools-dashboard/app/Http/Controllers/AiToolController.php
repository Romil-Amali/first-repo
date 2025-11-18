<?php

namespace App\Http\Controllers;

use App\Models\AiTool;
use Illuminate\Http\Request;

class AiToolController extends Controller
{
    public function index()
    {
        $tools = AiTool::with('category')
            ->where('is_active', true)
            ->orderBy('popularity', 'desc')
            ->paginate(12);

        return view('tools.index', compact('tools'));
    }

    public function show($slug)
    {
        $tool = AiTool::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedTools = AiTool::with('category')
            ->where('category_id', $tool->category_id)
            ->where('id', '!=', $tool->id)
            ->where('is_active', true)
            ->orderBy('popularity', 'desc')
            ->take(3)
            ->get();

        return view('tools.show', compact('tool', 'relatedTools'));
    }
}
