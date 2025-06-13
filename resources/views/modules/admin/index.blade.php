@extends('layouts.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm p-6">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div>
                <h2 class="text-xl lg:text-2xl font-semibold text-gray-800 mb-1 md:mb-2">
                    Good Morning, Admin 👋
                </h2>
                <p class="text-gray-600">
                    {{ now()->format('l, F j, Y') }}
                </p>
            </div>
            <div class="py-2 md:p-4 rounded-lg md:text-center min-w-[160px]">
                <div id="live-clock" class="text-2xl font-mono text-blue-600 tracking-tighter whitespace-nowrap">00:00:00</div>
                <span class="text-sm text-gray-500">Local Time</span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-blue-800">Total Competitions</h3>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalCompetitions }}</p>
            </div>
            
            <div class="bg-orange-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-orange-800">Active Blog Posts</h3>
                <p class="text-3xl font-bold text-orange-600 mt-2">{{ $activeBlogPosts }}</p>
            </div>
            
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-800">Latest News</h3>
                <p class="text-3xl font-bold text-gray-600 mt-2">{{ $latestNews }}</p>
            </div>
        </div>


        <!-- Content Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-8">

            <!-- Quick Actions -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 flex-1">
                    <a href="{{ route('admin.competition.add') }}" class="flex items-center justify-center p-4 text-center text-blue-600 rounded-lg bg-blue-50 hover:bg-blue-100 font-medium transition-colors">
                        New Competition
                    </a>
                    <a href="{{ route('admin.blog.create') }}" class="flex items-center justify-center p-4 text-center text-orange-600 rounded-lg bg-orange-50 hover:bg-orange-100 font-medium transition-colors">
                        New Blog Post
                    </a>
                    <a href="{{ route('admin.news.create') }}" class="flex items-center justify-center p-4 text-center text-gray-600 rounded-lg bg-gray-100 hover:bg-gray-200 font-medium transition-colors">
                        New News
                    </a>
                    <div class="hidden sm:flex p-4 text-center rounded-lg bg-gray-50 flex items-center justify-center text-gray-400">
                        <!-- Empty Placeholder -->
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h3>
                <div class="space-y-4">
                    @forelse($recentActivities as $activity)
                        <div class="flex items-start">
                            <div class="h-2 w-2 bg-{{ $activity['color'] }}-500 rounded-full mt-2 mr-3"></div>
                            <div>
                                <p class="text-gray-600">{{ Str::limit($activity['message'], 60) }}</p>
                                <span class="text-sm text-gray-500">{{ $activity['time']->diffForHumans() }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-500 text-center py-4">
                            No recent activities found.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Live clock update
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        document.getElementById('live-clock').textContent = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
@endsection
