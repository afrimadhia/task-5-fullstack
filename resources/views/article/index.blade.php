<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="row">
                            <div class="flex items-center justify-between">
                                <div class="w-3/4 m-3">
                                    <h1 class="text-4xl font-bold mb-2">Our Blog!</h1>
                                    <p class="text-lg text-gray-700">Enjoy reading our posts. Click on a post to read!</p>
                                </div>
                                <a href="/article/create/post" class="inline-block px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    Add Post +
                                </a>
                            </div>
                            @forelse($articles as $article)
                            <div class="p-4 rounded-lg shadow-md bg-white">
                                <ul class="list-disc list-inside m-2">
                                    <li>
                                        <a href="./article/{{ $article->id }}" class="text-blue-500 hover:text-blue-700">
                                            {{ ucfirst($article->title) }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="flex justify-center mb-4">
                                    <img src="{{ $article->image }}" alt="Current Image" class="mb-2 rounded-lg shadow-md">
                                </div>
                                <div class="font-bold text-lg">{{ ucfirst($article->user->name) }}</div>
                                <div class="text-gray-600 text-sm">Category: {{ ucfirst($article->category->name) }}</div>
                            </div>
                            <hr>
                            @empty
                            <p class="text-warning">No Article available</p>
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>