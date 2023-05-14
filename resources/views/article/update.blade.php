<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex justify-end py-4">
            <a href="/dashboard/article" class="btn btn-danger">Go back</a>
        </div>
        <div class="border rounded mt-5 p-4">
            <h1 class="text-4xl font-bold mb-2">Edit Post</h1>
            <p>Edit and submit this form to update a post</p>

            <hr class="my-4">

            <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Post Image</label>
                    <img src="/project-1/storage/app/ $article->image }}" alt="Current Image" class="mb-2">
                    <input type="file" id="image" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50" name="image">
                </div>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Post Title</label>
                    <input type="text" id="title" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50" name="title" placeholder="Enter Post Title" value="{{ $article->title }}" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-bold mb-2">Post Content</label>
                    <textarea id="content" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50" name="content" placeholder="Enter Post Content" rows="15" required>{{ $article->content }}</textarea>
                </div>
                <div class="flex justify-center mt-2">
                    <button id="btn-submit" class="px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Get references to the image input and preview elements
        const imageInput = document.querySelector('#image');
        const imagePreview = document.querySelector('#image-preview');

        // Listen for changes to the image input
        imageInput.addEventListener('change', () => {
            // Check if a file was selected
            if (imageInput.files && imageInput.files[0]) {
                // Create a new FileReader object
                const reader = new FileReader();

                // Set the onload callback to update the image preview
                reader.onload = (e) => {
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Image Preview" width="500"> `;
                }

                // Read the selected file as a data URL
                reader.readAsDataURL(imageInput.files[0]);
            }
        });
    </script>
</x-app-layout>