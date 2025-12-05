<!-- 
    NOTE: The <form> tags and @csrf are in the parent view (create.blade.php or edit.blade.php).
-->
<div class="space-y-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Post Details</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('title', $post->title) }}"
                    onkeyup="document.getElementById('slug').value = slugify(this.value)">
                @error('title') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug (Optional, will be generated)</label>
                <input type="text" name="slug" id="slug"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('slug', $post->slug) }}">
                @error('slug') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category <span class="text-red-500">*</span></label>
                <select name="category_id" id="category_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Author (Admin) -->
            <div>
                <label for="admin_id" class="block text-sm font-medium text-gray-700">Author <span class="text-red-500">*</span></label>
                <select name="admin_id" id="admin_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Author</option>
                    @php
                    $loggedInAdminId = Session::get('admin_id'); // Correct way to get admin ID
                    $currentAuthorId = old('admin_id', $post->admin_id ?? $loggedInAdminId); // Default to logged-in admin for new posts
                    @endphp
                    @foreach ($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ $author->id == $currentAuthorId ? 'selected' : '' }}
                        {{ $author->id != $loggedInAdminId ? 'disabled' : '' }}>
                        {{ $author->name }}
                    </option>
                    @endforeach
                </select>
                @error('admin_id') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <!-- Content (TinyMCE) -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
        <textarea name="content" id="content" class="w-full h-96">{{ old('content', $post->content) }}</textarea>
        @error('content') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Excerpt and Image -->
    <div x-data="{ imageSource: '{{ old('image_source', $post->imageAsset && !$post->imageAsset->is_url ? 'upload' : 'url') }}' }" class="bg-white shadow-lg rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Excerpt -->
            <div>
                <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt (Max 500 characters)</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Image Asset Chooser -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>

                <!-- Radio Buttons -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="flex items-center">
                        <input x-model="imageSource" id="source_url" name="image_source" type="radio" value="url" class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="source_url" class="ml-2 block text-base font-medium text-gray-700">From URL</label>
                    </div>
                    <div class="flex items-center">
                        <input x-model="imageSource" id="source_upload" name="image_source" type="radio" value="upload" class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="source_upload" class="ml-2 block text-base font-medium text-gray-700">Upload New</label>
                    </div>
                </div>



                <!-- Image Upload Input -->
                <div x-show="imageSource === 'upload'">
                    <label for="image_upload" class="block text-sm font-medium text-gray-700">Upload Image File</label>
                    <input type="file" name="image_upload" id="image_upload"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('image_upload') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    <p class="text-xs text-gray-500 mt-1">Make sure the parent form has `enctype="multipart/form-data"`.</p>
                </div>

                <!-- Image Preview -->
                @if ($post->imageAsset)
                <div class="mt-4">
                    <p class="text-sm font-medium text-gray-700">Current Image:</p>
                    <img src="{{ $post->imageAsset->url }}" alt="Current featured image" class="mt-2 h-20 w-auto object-cover rounded-lg shadow-sm">
                    <div class="flex items-center mt-2">
                        <input id="clear_image" name="clear_image" type="checkbox" value="1" class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <label for="clear_image" class="ml-2 block text-sm text-red-700">Clear Current Image</label>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Publication Settings -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Publication Settings</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Published At Date -->
            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700">Publish Date (Optional)</label>
                <input type="datetime-local" name="published_at" id="published_at"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                @error('published_at') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Publication Status Radio Buttons -->
            <div class="pt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Publication Status</label>
                <div class="mt-1 flex items-center space-x-4">
                    <div class="flex items-center">
                        <input id="status_draft" name="is_published" type="radio" value="0"
                            class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                            {{ old('is_published', $post->is_published ?? false) == false ? 'checked' : '' }}>
                        <label for="status_draft" class="ml-2 block text-base font-medium text-gray-700">
                            Draft
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="status_publish" name="is_published" type="radio" value="1"
                            class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                            {{ old('is_published', $post->is_published ?? false) == true ? 'checked' : '' }}>
                        <label for="status_publish" class="ml-2 block text-base font-medium text-gray-700">
                            Publish
                        </label>
                    </div>
                </div>
                @error('is_published') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <!-- Submit Button (Part of the form) -->
    <div class="text-right pt-4">
        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-xl transition duration-300 transform hover:scale-105">
            {{ $post->exists ? 'Update Post' : 'Create Post' }}
        </button>
    </div>
</div>

{{--
    SCRIPT BLOCK for TinyMCE and Slugify
--}}
<script src="https://cdn.tiny.cloud/1/k80y7ux7q9d6ub876oxi72wqjazksl012x9kpej3ytuyuhp3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    // Simple JavaScript function to convert a string to a URL-friendly slug
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    // TinyMCE setup 
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof tinymce !== 'undefined') {
            if (tinymce.get('content') === null) {
                tinymce.init({
                    selector: '#content',
                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table code wordcount media autoresize',
                    toolbar_mode: 'floating',
                    toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code',
                    min_height: 400,
                });
            }
        } else {
            console.error('TinyMCE not loaded. Check script tag and API key.');
        }
    });
</script>