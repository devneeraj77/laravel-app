<!-- 
    This is a reusable form for both creating and editing categories.
    It expects the $category variable to be passed. 
-->
<div class="space-y-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-6 text-gray-700">{{ $category->exists ? 'Edit Category' : 'New Category' }}</h2>

        <div class="grid grid-cols-1 gap-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('name', $category->name) }}"
                       onkeyup="document.getElementById('slug').value = slugify(this.value)">
                @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug (Optional, will be generated)</label>
                <input type="text" name="slug" id="slug"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('slug', $category->slug) }}">
                @error('slug') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-right pt-4">
        <button type="submit"
                class="bg-accent hover:bg-accent/70 text-white font-bold py-3 px-6 rounded-lg shadow-xl transition duration-300 transform hover:scale-105">
            {{ $category->exists ? 'Update Category' : 'Create Category' }}
        </button>
    </div>
</div>

<script>
    // Simple JavaScript function to convert a string to a URL-friendly slug
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }
</script>