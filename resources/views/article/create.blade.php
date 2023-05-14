<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex justify-end py-4">
            <a href="/dashboard/article" class="btn btn-danger">Go back</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-4xl mb-4">Create a New Post</h2>
            <p class="text-gray-700 mb-4">Fill and submit this form to create a post</p>

            <hr class="my-4">

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="image">Post Image</label>
                    <input type="file" name="image" id="image">
                    <div id="image-preview"></div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="title">Post Title</label>
                    <input class="w-full border border-gray-400 p-2 rounded-lg" type="text" id="title" name="title" placeholder="Enter Article Title" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="content">Post Content</label>
                    <textarea class="w-full border border-gray-400 p-2 rounded-lg" id="content" name="content" placeholder="Enter Post Content" rows="15" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="category_id">Select Category</label>
                    <select class="w-full border border-gray-400 p-2 rounded-lg" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-right">
                    <button class="btn btn-success px-4 py-2 rounded-lg hover:bg-blue-600">Create Post</button>
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