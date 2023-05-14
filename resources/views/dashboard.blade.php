<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-5">
                    <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
                    <p>This awesome blog has many articles, click the button below to see them</p>
                    <br>
                    <a href="/dashboard/article" class="btn btn-outline-primary">Show Blog</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>