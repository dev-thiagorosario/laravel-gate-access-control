<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-2xl font-bold mb-2">{{ $post->title }}</h3>
        <p class="text-gray-700 mb-4">{{ $post->body }}</p>
        <div class="text-sm text-gray-500">
            Author: {{ $post->user?->name ?? 'Unknown' }} ·
            Posted on {{ $post->created_at->format('F j, Y') }}
        </div>
        <div class="mt-4 flex flex-wrap gap-2">
            @can('post.update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Update
                </a>
            @endcan

            @can('post.delete', $post)
                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
            @endcan
        </div>
    </div>
</div>
