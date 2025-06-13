@extends('layouts.app', ['path' => []])

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Article Header -->
        <div class="mb-8">
            <div class="flex items-center mb-4">
                <span class="inline-block bg-green-100 text-green-600 px-2 py-1 text-xs font-medium rounded">
                    {{ $blog->category->name }}
                </span>
                <span class="ml-2 text-gray-500 text-sm">
                    {{ $blog->publish_date->format('F j, Y') }}
                </span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold mb-6">{{ $blog->title }}</h1>

            <!-- Author info -->
            <div class="flex items-center mb-6">
                <div class="h-10 w-10 rounded-full bg-gray-300 overflow-hidden">
                    <img src="{{ $blog->author->avatar_url ?? asset('images/avatar1.png') }}"
                        alt="{{ $blog->author->name }}" class="w-full h-full object-cover">
                </div>
                <div class="ml-3">
                    <p class="text-gray-800 font-medium">{{ $blog->author->name }}</p>
                    <p class="text-gray-500 text-sm">{{ $blog->author->department }}</p>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        @if($blog->thumbnail)
            <div class="mb-8">
                <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title }}" class="w-full h-auto rounded-lg shadow-md">
            </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-lg max-w-none">
            {!! $blog->content !!}
        </div>

        <!-- Back to Blog Link -->
        <div class="mt-12">
            <a href="{{ route('blog') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Back to All Articles
            </a>
        </div>
    </div>
@endsection