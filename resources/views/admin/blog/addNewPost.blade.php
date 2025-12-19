{{-- Extend your Admin Layout --}}
@extends('admin.layouts.app') 

@section('title', 'All Blog Posts')

@section('content')
<div class="container-admin bg-white shadow-2xl rounded-xl mt-10 mb-10">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 border-b pb-4">Create New Blog Post</h1>

    {{-- Session Messages --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6" role="alert">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6" role="alert">
            <p class="font-bold">Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="space-y-8">
            <!-- Title -->
            <div class="flex flex-col">
                <label for="title" class="text-sm font-semibold text-gray-700 mb-1">Post Title</label>
                <input type="text" name="title" id="title" required
                       class="rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150"
                       value="{{ old('title') }}" placeholder="A compelling headline for your post">
                @error('title')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Excerpt -->
            <div class="flex flex-col">
                <label for="excerpt" class="text-sm font-semibold text-gray-700 mb-1">Excerpt / SEO Description (Optional)</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                          class="rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150"
                          placeholder="A short summary for previews and search engines (Max 150 chars).">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- TinyMCE Content Editor -->
            <div class="flex flex-col">
                <label for="content" class="text-sm font-semibold text-gray-700 mb-2">Content</label>
                <textarea name="content" id="content" class="shadow-sm">
                    {{ old('content') }}
                </textarea>
                @error('content')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Category -->
                <div class="flex flex-col">
                    <label for="category_id" class="text-sm font-semibold text-gray-700 mb-1">Category</label>
                    <select name="category_id" id="category_id"
                            class="rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-white transition duration-150">
                        <option value="">-- Select Category --</option>
                        @isset($categories)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

<div class="p-6 bg-gray-50 rounded-lg border border-gray-200 shadow-inner">
    <h3 class="text-lg font-bold text-gray-700 mb-4">Featured Image</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Image URL -->
        <div class="flex flex-col">
            <label for="image_url" class="text-sm font-semibold text-gray-700 mb-1">Image URL (External)</label>
            <input type="url" name="image_url" id="image_url"
                    class="rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150"
                    value="{{ old('image_url') }}" placeholder="https://example.com/image.jpg">
            @error('image_url')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="flex flex-col">
            <label for="image_upload" class="text-sm font-semibold text-gray-700 mb-1">Or Upload Image</label>
            <input type="file" name="image_upload" id="image_upload"
                    class="rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150">
            @error('image_upload')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

            <!-- Publishing & Scheduling -->
            <div class="p-6 bg-gray-50 rounded-lg border border-gray-200 shadow-inner">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Publishing Options</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Published At (Date/Time Picker) -->
                    <div class="flex flex-col">
                        <label for="published_at" class="text-sm font-medium text-gray-700 mb-1">Scheduled Publish Date/Time (Optional)</label>
                        <input type="datetime-local" name="published_at" id="published_at"
                               class="rounded-lg border border-gray-300 p-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-white transition duration-150"
                               value="{{ old('published_at') }}">
                        <p class="mt-1 text-xs text-gray-500">Leave blank to use the "Publish Immediately" checkbox.</p>
                        @error('published_at')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Published Checkbox -->
                    <div class="flex items-start pt-8">
                        <input id="is_published" name="is_published" type="checkbox" value="1"
                               class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 shadow-sm"
                               {{ old('is_published') ? 'checked' : '' }}>
                        <label for="is_published" class="ml-3 block text-base font-medium text-gray-900">
                            Publish Immediately
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-5 flex justify-end">
                <button type="submit"
                        class="inline-flex justify-center rounded-lg border border-transparent bg-indigo-600 py-3 px-8 text-lg font-bold text-white shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-[1.02]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                    Save & Create Post
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    // Initialize TinyMCE for the 'content' textarea
    tinymce.init({
        selector: '#content',
        plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link code | help',
        menubar: 'file edit view insert format tools table help',
        toolbar_mode: 'floating',
        height: 600,
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; font-size:16px; line-height: 1.6; padding: 10px; }'
    });
</script>

</body>
@endsection