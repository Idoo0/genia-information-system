@extends('layouts.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 sm:mb-0">
                Manage News
            </h2>
            <a href="{{ route('admin.news.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add News
            </a>
        </div>

        <!-- Filters -->
        <!-- <form id="filter-form" class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div>
                <label for="level-filter" class="block text-sm font-medium text-gray-700 mb-1">Competition Level</label>
                <select id="level-filter" name="level" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Levels</option>
                    <option value="International" {{ request('level') == 'International' ? 'selected' : '' }}>International</option>
                    <option value="Regional" {{ request('level') == 'Regional' ? 'selected' : '' }}>Regional</option>
                    <option value="National" {{ request('level') == 'National' ? 'selected' : '' }}>National</option>
                </select>
            </div>

            <div>
                <label for="competition-filter" class="block text-sm font-medium text-gray-700 mb-1">Competition</label>
                <select id="competition-filter" name="competition" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Competitions</option>
                    <option value="PKM" {{ request('competition') == 'PKM' ? 'selected' : '' }}>PKM</option>
                    <option value="GELATIK" {{ request('competition') == 'GELATIK' ? 'selected' : '' }}>GELATIK</option>
                    <option value="ON MIPA PT" {{ request('competition') == 'ON MIPA PT' ? 'selected' : '' }}>ON MIPA PT</option>
                    <option value="COMPFEST" {{ request('competition') == 'COMPFEST' ? 'selected' : '' }}>COMPFEST</option>
                </select>
            </div>

            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search news..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
        </form> -->

        <!-- News Table -->
        <div class="overflow-x-auto">
            @if($news->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No news yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new news post.</p>
                    <div class="mt-6">
                        <a href="{{ route('admin.news.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add News
                        </a>
                    </div>
                </div>
            @else
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Level</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Competition</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($news as $item)
                        <tr data-news-id="{{ $item->id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md object-cover" src="{{ Storage::url($item->thumbnail ?? 'images/placeholder.png') }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $item->level === 'International' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $item->level === 'Regional' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $item->level === 'National' ? 'bg-blue-100 text-blue-800' : '' }}">
                                    {{ $item->level }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->competition }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->publish_date->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.news.edit', $item->slug) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                <button data-news-id="{{ $item->id }}" onclick="deleteNews('{{ $item->id }}')" class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
            <div class="mt-4">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg p-8 max-w-sm mx-auto">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Confirm Delete</h3>
        <p class="text-gray-500 mb-6">Are you sure you want to delete this news? This action cannot be undone.</p>
        <div class="flex justify-end space-x-3">
            <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                Cancel
            </button>
            <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Delete
            </button>
        </div>
    </div>
</div>

<script>
let newsIdToDelete = null;

function deleteNews(id) {
    newsIdToDelete = id;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.getElementById('deleteModal').classList.remove('flex');
    newsIdToDelete = null;
}

function confirmDelete() {
    if (newsIdToDelete) {
        fetch(`/admin/news/${newsIdToDelete}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }).then(response => {
            if (response.ok) {
                const row = document.querySelector(`tr[data-news-id="${newsIdToDelete}"]`);
                if (row) {
                    row.remove();
                }
                const tbody = document.querySelector('tbody');
                if (tbody && tbody.children.length === 0) {
                    window.location.reload();
                }
                alert('News deleted successfully');
            } else {
                response.json().then(data => {
                    alert(data.message || 'Failed to delete news. Please try again.');
                });
            }
        }).catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the news. Please try again.');
        }).finally(() => {
            closeDeleteModal();
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('button[onclick^="deleteNews"]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const newsId = this.getAttribute('data-news-id');
            if (newsId) {
                deleteNews(newsId);
            }
        });
    });

    document.getElementById('confirmDelete').addEventListener('click', confirmDelete);

    // Filter functionality
    const filterForm = document.getElementById('filter-form');
    const inputs = filterForm.querySelectorAll('select, input');
    inputs.forEach(input => {
        input.addEventListener('change', () => {
            filterForm.submit();
        });
    });
});
</script>
@endsection