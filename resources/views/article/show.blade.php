<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex flex-col items-center">
            <div class="w-full pt-2">
                <div class="flex justify-end mb-4">
                    <a href="/dashboard/article" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Go back</a>
                </div>
                <div class="flex justify-center mb-4">
                    <img src="{{ $article->image }}" alt="Current Image" class="mb-2 rounded-lg shadow-md">
                </div>
                @if (Auth::id() == $article->user_id)
                <div class="flex justify-center mb-4">
                    <a href="/article/{{ $article->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit Post</a>
                    <form action="{{ route('article.delete', $article->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Post</button>
                    </form>
                </div>
                @endif
                <h1 class="text-4xl font-bold mb-4 text-center">{{ ucfirst($article->title) }}</h1>
                <p class="text-base mb-4 text-justify px-4 pb-4">{!! $article->content !!}</p>
                <hr class="border-t border-gray-400">
            </div>
        </div>
    </div>
</x-app-layout>