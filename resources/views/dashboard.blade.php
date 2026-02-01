<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @can('post.create')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create New Post
                </a>
            </div>
        @endcan

       @foreach ($posts as $post)
            <x-post-component :post="$post" />
        @endforeach
    </div>
</x-app-layout>
