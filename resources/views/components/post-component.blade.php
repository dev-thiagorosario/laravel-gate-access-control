<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-2xl font-bold mb-2">{{ $post->title }}</h3>
        <p class="text-gray-700 mb-4">{{ $post->body }}</p>
        <div class="text-sm text-gray-500">
            Author: {{ $post->user?->name ?? 'Unknown' }} ·
            Posted on {{ $post->created_at->format('F j, Y') }}
        </div>
        @can('post.update', $post)
            <div class="mt-4">
                <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Update
                </a>
            </div>
        @endcan
    </div>
</div>
