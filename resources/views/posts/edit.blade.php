<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('posts.update', $post) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="title">Titulo</label>
                        <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}" class="mt-1 block w-full rounded border-gray-300" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="body">Conteudo</label>
                        <textarea id="body" name="body" rows="6" class="mt-1 block w-full rounded border-gray-300">{{ old('body', $post->body) }}</textarea>
                    </div>

                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                        Atualizar Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
