@extends('layouts.app', ['path' => ['Beranda', 'Blog']])

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Page Title -->
        <div class="mb-8 w-full flex items-center flex-col px-4 text-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">Explore Our Blog</h1>
            <p class="text-sm sm:text-base text-gray-600 mt-2 max-w-md sm:max-w-lg">Discover the latest insights, tips, and
                news from our team</p>
        </div>

        <!-- Featured/Highlighted Blog Post -->
        @if($featuredBlog)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-12">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        <img src="{{ Storage::url($featuredBlog->thumbnail) }}" alt="{{ $featuredBlog->title }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="md:w-1/2 p-8">
                        <div class="flex items-center mb-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">FEATURED</span>
                            <span class="ml-2 text-sm text-gray-500">{{ $featuredBlog->formatted_date }}</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $featuredBlog->title }}</h2>
                        <p class="text-gray-600 mb-6">{{ $featuredBlog->caption }}</p>
                        <div class="flex items-center mb-6">
                            <img src="{{ $featuredBlog->author->avatar_url ?? asset('images/avatar1.png') }}"
                                alt="{{ $featuredBlog->author->name }}" class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <p class="text-gray-800 font-medium">{{ $featuredBlog->author->name }}</p>
                                <p class="text-gray-500 text-sm">{{ $featuredBlog->author->department }}</p>
                            </div>
                        </div>
                        <a href="{{ route('details_blog', $featuredBlog->slug) }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">Read
                            More</a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Blog Post Categories -->
        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('blog') }}"
                class="bg-{{ request()->get('category') ? 'gray-200 hover:bg-gray-300 text-gray-800' : 'blue-600 text-white' }} px-4 py-2 rounded-lg font-medium transition">All</a>
            @foreach($categories as $category)
                <a href="{{ route('blog', ['category' => $category->slug]) }}"
                    class="bg-{{ request()->get('category') == $category->slug ? 'blue-600 text-white' : 'gray-200 hover:bg-gray-300 text-gray-800' }} px-4 py-2 rounded-lg font-medium transition">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Blog Post Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-lg">
                    <img src="{{ Storage::url($blog->thumbnail) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">{{ $blog->category->name }}</span>
                            <span class="ml-2 text-sm text-gray-500">{{ $blog->formatted_date }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $blog->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $blog->caption }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="{{ $blog->author->avatar_url ?? asset('images/avatar1.png') }}"
                                    alt="{{ $blog->author->name }}" class="w-8 h-8 rounded-full mr-2">
                                <span class="text-gray-700 text-sm">{{ $blog->author->name }}</span>
                            </div>
                            <a href="{{ route('details_blog', $blog->slug) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium">Read More →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">No blog posts found</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $blogs->appends(request()->query())->links() }}
        </div>

        <!-- Newsletter Signup -->
        <div class="mt-16 bg-gray-100 rounded-lg p-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Bagikan Cerita Anda!</h3>
                <p class="text-gray-600 mb-6">Ayo bagikan pada kami dan akan kami tampilkan pada website Genia!</p>
                <div class="flex flex-col justify-center sm:flex-row gap-2 max-w-md mx-auto">
                    <a href="{{ route('send_blog') }}">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300">Kirim
                            Cerita</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection