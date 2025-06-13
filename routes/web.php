<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\ThumbnailController;

// ====================
// LANDING
// ====================
Route::get('/', function () {
    return view('modules.landing.index');
});

Route::get('/about-us', function () {
    return view('modules.landing.about_us');
});


Route::get('/awarded', function () {
    return view('modules.landing.awarded');
})->name('awarded');

// ====================
// NEWS
// ====================
Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
// ====================
// COMPETITION
// ====================
Route::get('/competition', [App\Http\Controllers\CompetitionController::class, 'index'])->name('competition');
Route::get('/competition/{id}', [App\Http\Controllers\CompetitionController::class, 'show'])->name('competition.details');
Route::get('/details_participant', function () {
    return view('modules.competition.details_participant');
})->name('details_participant');
// ====================
// BLOG
// ====================
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/details_blog/{slug?}', [BlogController::class, 'show'])->name('details_blog');
Route::get('/send_blog', [BlogController::class, 'submitForm'])->name('send_blog');
// ====================
// ADMIN
// ====================
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('modules.admin.index');
    })->name('dashboard');

    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/dashboard', function () {
            $totalCompetitions = \App\Models\Competition::count();
            $activeBlogPosts = \App\Models\Blog::count();
            $latestNews = \App\Models\News::count(); // Keep this for the count
            
            // Get recent activities - 1 of each
            $recentActivities = collect();
            
            // Latest competition
            $latestCompetition = \App\Models\Competition::latest('created_at')->first();
            if ($latestCompetition) {
                $recentActivities->push([
                    'message' => 'Published "' . $latestCompetition->name . '" competition',
                    'time' => $latestCompetition->created_at,
                    'color' => 'blue'
                ]);
            }
            
            // Latest blog post
            $latestBlog = \App\Models\Blog::latest('updated_at')->first();
            if ($latestBlog) {
                $recentActivities->push([
                    'message' => 'Updated blog post "' . $latestBlog->title . '"',
                    'time' => $latestBlog->updated_at,
                    'color' => 'orange'
                ]);
            }
            
            // Latest news (use different variable name)
            $latestNewsItem = \App\Models\News::latest('created_at')->first();
            if ($latestNewsItem) {
                $recentActivities->push([
                    'message' => 'Added news article "' . $latestNewsItem->title . '"',
                    'time' => $latestNewsItem->created_at,
                    'color' => 'gray'
                ]);
            }
            
            // Sort by time (most recent first)
            $recentActivities = $recentActivities->sortByDesc('time');
            
            return view('modules.admin.index', compact('totalCompetitions', 'activeBlogPosts', 'latestNews', 'recentActivities'));
        })->name('dashboard');

        // Competition
        Route::get('/competition/add', function () {
            return view('modules.admin.competition.add');
        })->name('competition.add');
      
        Route::get('/competitions', [App\Http\Controllers\AdminCompetitionController::class, 'index'])->name('competition');
        Route::get('/competitions/create', [App\Http\Controllers\AdminCompetitionController::class, 'create'])->name('competition.create');
        Route::post('/competitions', [App\Http\Controllers\AdminCompetitionController::class, 'store'])->name('competition.store');
        Route::get('/competitions/{id}/edit', [App\Http\Controllers\AdminCompetitionController::class, 'edit'])->name('competition.edit');
        Route::put('/competitions/{id}', [App\Http\Controllers\AdminCompetitionController::class, 'update'])->name('competition.update');
        Route::delete('/competitions/{id}', [App\Http\Controllers\AdminCompetitionController::class, 'destroy'])->name('competition.destroy');
        // News
        Route::get('/news', [App\Http\Controllers\AdminNewsController::class, 'index'])->name('news');
        Route::get('/news/create', [App\Http\Controllers\AdminNewsController::class, 'create'])->name('news.create');
        Route::post('/news', [App\Http\Controllers\AdminNewsController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit', [App\Http\Controllers\AdminNewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [App\Http\Controllers\AdminNewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [App\Http\Controllers\AdminNewsController::class, 'destroy'])->name('news.destroy');
        // Blog
        Route::get('/blog', [AdminBlogController::class, 'index'])->name('blog');
        Route::get('/blog/add', [AdminBlogController::class, 'create'])->name('blog.create');
        Route::post('/blog/add', [AdminBlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/edit/{blog?}', [AdminBlogController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/edit/{blog}', [AdminBlogController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{blog}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');

    });
});
