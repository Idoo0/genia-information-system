@extends('layouts.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 md:mb-0">
                Manage Blog Posts
            </h2>
            <a href="{{ route('admin.blog.create') }}" 
               class="w-full md:w-auto px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors flex items-center justify-center md:justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" 
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" 
                          clip-rule="evenodd" />
                </svg>
                Create New Post
            </a>
        </div>

        <!-- Blog Posts Table -->
        <div class="overflow-x-auto border border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <!-- Judul & Thumbnail -->
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Blog Post
                        </th>
                        <!-- Author (hanya tampil di xl ke atas) -->
                        <th class="hidden xl:table-cell px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Author
                        </th>
                        <!-- Category (hanya tampil di md ke atas) -->
                        <th class="hidden md:table-cell px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <!-- Date (hanya tampil di lg ke atas) -->
                        <th class="hidden lg:table-cell px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <!-- Actions -->
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($blogs as $blog)
                        <tr>
                            <!-- Blog Post (Thumbnail + Judul + Caption) -->
                            <td class="px-4 py-4 whitespace-normal">
                                <div class="flex items-center">
                                    <!-- Thumbnail untuk md ke atas -->
                                    @if($blog->thumbnail)
                                        <div class="hidden md:block flex-shrink-0 h-12 w-16">
                                            <img
                                                class="h-12 w-16 rounded-md object-cover"
                                                src="{{ Storage::url($blog->thumbnail) }}"
                                                alt="Thumbnail {{ $blog->title }}"
                                            >
                                        </div>
                                    @endif
                                    <div class="md:ml-3">
                                        <!-- Judul: tampil terbatas di sm, penuh di md -->
                                        <div class="text-sm font-medium text-gray-900 break-words">
                                            <span class="md:hidden">
                                                {{ \Illuminate\Support\Str::limit($blog->title, 20, '…') }}
                                            </span>
                                            <span class="hidden md:inline">
                                                {{ \Illuminate\Support\Str::limit($blog->title, 50, '…') }}
                                            </span>
                                        </div>
                                        <!-- Caption: hanya tampil di lg -->
                                        <div class="hidden lg:block text-xs text-gray-500 mt-1">
                                            {{ \Illuminate\Support\Str::limit($blog->caption, 60, '…') }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Author (nama dan departemen) -->
                            <td class="hidden xl:table-cell px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $blog->author->name }}</div>
                                <div class="text-xs text-gray-500">{{ $blog->author->department }}</div>
                            </td>

                            <!-- Category -->
                            <td class="hidden md:table-cell px-4 py-4 whitespace-nowrap">
                                @php
                                    $categoryName  = strtolower($blog->category->name);
                                    $categoryColor = match($categoryName) {
                                        'technology'  => 'bg-purple-100 text-purple-800',
                                        'design'      => 'bg-blue-100 text-blue-800',
                                        'development' => 'bg-green-100 text-green-800',
                                        'business'    => 'bg-yellow-100 text-yellow-800',
                                        default       => 'bg-gray-100 text-gray-800',
                                    };
                                @endphp
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $categoryColor }}">
                                    {{ ucfirst($blog->category->name) }}
                                </span>
                            </td>

                            <!-- Publish Date -->
                            <td class="hidden lg:table-cell px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $blog->publish_date->format('M d, Y') }}
                                </div>
                            </td>

                            <!-- Actions (View, Edit, Delete) -->
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-3">
                                    <!-- View Post (buka di tab baru) -->
                                    <a href="{{ route('details_blog', $blog->slug) }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-900 transition-colors" 
                                       title="Preview Post">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542
                                                    7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <!-- Edit Post -->
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" 
                                       class="text-green-600 hover:text-green-900 transition-colors" 
                                       title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-1.414-9.414a2 2 0
                                                     112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <!-- Delete Post -->
                                    <button type="button" 
                                            class="text-red-600 hover:text-red-900 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 rounded p-1" 
                                            onclick="confirmDelete({{ $blog->id }}, '{{ str_replace("'", "\\'", $blog->title) }}')" 
                                            title="Delete Post">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                No blog posts found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $blogs->withQueryString()->links() }}
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium text-gray-900">Confirm Deletion</h3>
            <button type="button" onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                         d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mb-6">
            <p class="text-sm text-gray-600 mb-2">
                Are you sure you want to delete this blog post?
            </p>
            <p class="text-sm font-medium text-gray-900" id="blogTitle">
                <!-- Blog title will be inserted here -->
            </p>
            <p class="text-sm text-red-600 mt-2">
                This action cannot be undone and will permanently remove the post and all associated files.
            </p>
        </div>
        <div class="flex justify-end space-x-3">
            <button type="button" onclick="closeDeleteModal()" 
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
                Cancel
            </button>
            <form id="deleteForm" method="POST" action="" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        id="deleteButton"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium disabled:opacity-50 disabled:cursor-not-allowed">
                    Delete Post
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
        <svg class="animate-spin h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span class="text-gray-700">Deleting post...</span>
    </div>
</div>

@push('scripts')
<script>
    let currentBlogToDelete = null;

    function confirmDelete(blogId, blogTitle) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const blogTitleElement = document.getElementById('blogTitle');

        currentBlogToDelete = { id: blogId, title: blogTitle };
        blogTitleElement.textContent = blogTitle;
        form.action = `{{ url('admin/blog') }}/${blogId}`; // e.g. http://127.0.0.1:8000/admin/blog/5

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';

        setTimeout(() => {
            const cancelButton = modal.querySelector('button[onclick="closeDeleteModal()"]');
            if (cancelButton) cancelButton.focus();
        }, 100);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        document.body.style.overflow = '';
        // Only clear the action if the user clicked "Cancel," not on submit.
        const form = document.getElementById('deleteForm');
        if (form) form.action = '';
        const blogTitleElement = document.getElementById('blogTitle');
        if (blogTitleElement) blogTitleElement.textContent = '';
        currentBlogToDelete = null;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const deleteForm = document.getElementById('deleteForm');
        if (deleteForm) {
            deleteForm.addEventListener('submit', function(e) {
                const deleteButton = document.getElementById('deleteButton');
                const loadingOverlay = document.getElementById('loadingOverlay');

                if (deleteButton) {
                    deleteButton.disabled = true;
                    deleteButton.textContent = 'Deleting...';
                }
                if (loadingOverlay) {
                    loadingOverlay.classList.remove('hidden');
                    loadingOverlay.classList.add('flex');
                }
                // <-- Remove closeDeleteModal() here so form.action stays intact
                // closeDeleteModal();
            });
        }
    });

    window.addEventListener('click', function(event) {
        const modal = document.getElementById('deleteModal');
        if (modal && event.target === modal && !modal.classList.contains('hidden')) {
            closeDeleteModal();
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            const modal = document.getElementById('deleteModal');
            if (modal && !modal.classList.contains('hidden')) {
                closeDeleteModal();
            }
        }
    });

    @if(session('success'))
        showNotification('{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        showNotification('{{ session('error') }}', 'error');
    @endif

    function showNotification(message, type) {
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700';

        notification.className = `fixed top-4 right-4 ${bgColor} border px-4 py-3 rounded z-50 max-w-sm shadow-lg`;
        notification.innerHTML = `
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    ${type === 'success' 
                        ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>'
                        : '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>'
                    }
                </svg>
                <span class="flex-1">${message}</span>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="ml-2 text-current hover:text-opacity-75 flex-shrink-0">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        `;
        document.body.appendChild(notification);
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 5000);
    }
</script>
@endpush
@endsection