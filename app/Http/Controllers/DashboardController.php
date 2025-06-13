<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Blog;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCompetitions = Competition::count();
        $activeBlogPosts = Blog::count();
        $latestNews = News::count();
        
        return view('dashboard', compact('totalCompetitions', 'activeBlogPosts', 'latestNews'));
    }
}