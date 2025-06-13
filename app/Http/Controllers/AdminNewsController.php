<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::orderBy('publish_date', 'desc');

        if ($request->has('level') && $request->level !== '') {
            $query->level($request->level);
        }

        if ($request->has('competition') && $request->competition !== '') {
            $query->competition($request->competition);
        }

        if ($request->has('search') && $request->search !== '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(10)->appends($request->query());
        return view('modules.admin.news.manage', compact('news'));
    }

    public function create()
    {
        return view('modules.admin.news.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'level' => 'required|in:International,Regional,National',
            'competition' => 'required|in:PKM,GELATIK,ON MIPA PT,COMPFEST',
            'publish_date' => 'required|date',
            'thumbnail' => 'required|image|max:2048',
            'slug' => 'nullable|unique:news,slug',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('news/thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        News::create($validated);

        return redirect()->route('admin.news')->with('success', 'News created successfully!');
    }

    public function edit(News $news)
    {
        return view('modules.admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'level' => 'required|in:International,Regional,National',
            'competition' => 'required|in:PKM,GELATIK,ON MIPA PT,COMPFEST',
            'publish_date' => 'required|date',
            'thumbnail' => 'nullable|image|max:2048',
            'slug' => 'nullable|unique:news,slug,' . $news->id,
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
                Storage::disk('public')->delete($news->thumbnail);
            }
            $path = $request->file('thumbnail')->store('news/thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $news->update($validated);

        return redirect()->route('admin.news')->with('success', 'News updated successfully!');
    }

    public function destroy(News $news)
{
    try {
        if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'News deleted successfully'
        ]);
    } catch (\Exception $e) {
        \Log::error('News Deletion Failed', ['error' => $e->getMessage(), 'slug' => $news->slug]);
        return response()->json([
            'success' => false,
            'message' => 'Failed to delete news: ' . $e->getMessage()
        ], 500);
    }
}
}