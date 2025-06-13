@extends('layouts.app', ['path' => ['Beranda', 'News']])

@section('title', 'News Page')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="flex flex-col bg-[#0073EF] items-center py-24 md:py-32 lg:py-48">
        <div class="text-4xl md:text-6xl lg:text-8xl text-white text-center">
            <p>Genia News</p>
        </div>
        <div class="text-base md:text-lg text-white text-center mt-4 md:mt-6 lg:mt-8">
            <p>UKM Genia Information Section</p>
        </div>
    </section>

    <!-- News Section -->
    <section class="bg-white py-8 sm:py-12 px-4">
        <div class="w-full mx-auto bg-[#F7EFD9] rounded-lg px-4 sm:px-8 py-6 sm:py-8">
            <div class="mb-8 sm:mb-16">
                <p class="text-sm text-gray-600 mb-2 pl-4 sm:pl-10">
                    News Updates
                </p>
                <div class="pl-4 sm:pl-10 pr-4 sm:pr-10">
                    <hr class="border-t border-gray-300">
                </div>
            </div>

            @if($news->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No news available</h3>
                    <p class="mt-1 text-sm text-gray-500">Check back later for updates.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-8">
                    @foreach($news as $item)
                        <a href="{{ route('news.show', $item->slug) }}" class="bg-white rounded-[20px] shadow-lg p-8 hover:shadow-xl transition-shadow">
                            <div class="flex flex-col items-center text-center">
                                @if($item->thumbnail)
                                    <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" class="h-16 w-auto mb-6 object-cover rounded-md">
                                @endif
                                <h3 class="text-xl font-medium">{{ $item->title }}</h3>
                                <p class="text-sm text-gray-500 mt-2">{{ $item->publish_date->format('F j, Y') }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $item->level }} - {{ $item->competition }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($news->hasPages())
                    <div class="mt-4">
                        {{ $news->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>
</div>
@endsection