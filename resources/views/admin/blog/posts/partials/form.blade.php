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
    <div class="bg-white shadow-lg rounded-lg p-6 s">
        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
        <textarea name="content" id="content" class="w-full h-96 sticky top-0">{{ old('content', $post->content) }}</textarea>
        @error('content') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
        <h3 class="text-xl font-bold mb-4">Frequently Asked Questions</h3>

        <div id="faqs-container">
            @if(isset($post) && $post->faqs)
            @foreach($post->faqs as $index => $faq)
            <div class="faq-item border-b pb-4 mb-4">
                <input type="hidden" name="faqs[{{ $index }}][id]" value="{{ $faq->id }}">
                <div class="mb-4">
                    <label for="faqs_{{ $index }}_question" class="block text-gray-700">Question</label>
                    <input type="text" name="faqs[{{ $index }}][question]" id="faqs_{{ $index }}_question" value="{{ old('faqs.'.$index.'.question', $faq->question) }}" class="input w-full border-gray-300 rounded-md shadow-sm">
                    @error('faqs.'.$index.'.question') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="mb-2">
                    <label for="faqs_{{ $index }}_answer" class="block text-gray-700">Answer</label>
                    <textarea name="faqs[{{ $index }}][answer]" id="faqs_{{ $index }}_answer" rows="3" class="w-full border-gray-300 textarea rounded-md shadow-sm">{{ old('faqs.'.$index.'.answer', $faq->answer) }}</textarea>
                    @error('faqs.'.$index.'.answer') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="button" class="text-red-500 remove-faq">Remove</button>
            </div>
            @endforeach
            @endif
        </div>

        <button type="button" id="add-faq" class="mt-4 bg-accent hover:bg-accent/80 text-white font-bold py-2 px-4 rounded">
            Add FAQ
        </button>
    </div>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Initialize FAQ index based on existing FAQs (if editing a post)
            let faqIndex = `{{ isset($post) && $post->faqs ? $post->faqs->count() : 0 }}`;

            // Add FAQ button
            const addBtn = document.getElementById('add-faq');
            const container = document.getElementById('faqs-container');

            addBtn.addEventListener('click', function() {

                const template = `
                <div class="faq-item border-b pb-4 mb-4">

                    <input type="hidden" name="faqs[${faqIndex}][id]" value="">

                    <div class="mb-4">
                        <label for="faqs_${faqIndex}_question" class="block text-gray-700">Question</label>
                        <input 
                            type="text"
                            name="faqs[${faqIndex}][question]"
                            id="faqs_${faqIndex}_question"
                            class="w-full border-gray-300 input rounded-md shadow-sm"
                        >
                    </div>

                    <div class="mb-2">
                        <label for="faqs_${faqIndex}_answer" class="block text-gray-700">Answer</label>
                        <textarea
                            name="faqs[${faqIndex}][answer]"
                            id="faqs_${faqIndex}_answer"
                            rows="3"
                            class="w-full border-gray-300 textarea rounded-md shadow-sm"
                        ></textarea>
                    </div>

                    <button type="button" class="text-red-500 remove-faq">Remove</button>
                </div>
            `;

                container.insertAdjacentHTML('beforeend', template);
                faqIndex++;
            });

            // Remove FAQ item
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-faq')) {
                    e.target.closest('.faq-item').remove();
                }
            });
        });
    </script>
    @endpush



    <!-- Excerpt and Image -->
    <div x-data="{ imageSource: '{{ old('image_source', $post->imageAsset && !$post->imageAsset->is_url ? 'upload' : 'url') }}' }" class="bg-white shadow-lg rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Excerpt -->
            <div>
                <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt (Max 500 characters)</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="mt-1 textarea block w-full border border-gray-300 rounded-md shadow-sm p-3 ">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Image Asset Chooser -->
            <div>
                <!-- Image Upload Input -->
                <div class="rounded-md p-4">
                    <label for="image_upload" class="block py-2 text-sm font-medium text-gray-700">Featured Image File</label>
                    <input type="file" name="image_upload" id="image_upload"
                        class="mt-1 block w-full text-sm text-accent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-base-300 file:text-accent hover:file:bg-base-200"
                        accept="image/*">

                    <div id="image-upload-feedback" class="text-sm text-red-500 mt-1">
                        @error('image_upload')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <p class="text-xs mt-2 text-gray-500">Ensure the image size is exactly 1200 x 630 pixels (recommended) and does not exceed 2MB.</p>
                </div>

                @push('scripts')
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const fileInput = document.getElementById('image_upload');
                        const feedbackDiv = document.getElementById('image-upload-feedback');
                        const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes

                        fileInput.addEventListener('change', function(event) {
                            // Clear previous messages
                            feedbackDiv.innerHTML = '';

                            const file = event.target.files[0];
                            if (file && file.size > maxFileSize) {
                                feedbackDiv.innerHTML = '<span>The image may not be greater than 2MB.</span>';
                                // Clear the file input's value to prevent submitting the large file
                                event.target.value = '';
                            }
                        });
                    });
                </script>
                @endpush
            
                <!-- Image Preview -->
                @if ($post->imageAsset)
                <div class="mt-4">
                    <p class="text-sm font-medium text-gray-700">Current Image:</p>
                    <img src="{{ $post->imageAsset->image_url }}" alt="Current featured image" class="mt-2 h-20 w-auto object-cover rounded-lg shadow-sm">
                    <div class="flex items-center mt-2">
                        <input id="clear_image" name="clear_image" type="checkbox" value="1" class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500" checked>
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
        <button type="submit" id="submit-button"
            class="bg-accent hover:bg-accent/80 text-white font-bold py-3 px-6 rounded-lg shadow-xl transition duration-300 transform hover:scale-105 flex items-center justify-center">
            <span class="button-text">{{ $post->exists ? 'Update Post' : 'Create Post' }}</span>
            <svg class="animate-spin h-5 w-5 text-white ml-2 hidden" id="spinner" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
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
                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table code wordcount media autoresize fullscreen',
                    toolbar_mode: 'floating',
                    toolbar: 'undo redo | blocks | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code fullscreen',
                    min_height: 400,
                });
            }
        } else {
            console.error('TinyMCE not loaded. Check script tag and API key.');
        }

        const submitButton = document.getElementById('submit-button');
        if (submitButton) {
            const form = submitButton.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    submitButton.disabled = true;
                    const buttonText = submitButton.querySelector('.button-text');
                    const spinner = document.getElementById('spinner');
                    if (buttonText) buttonText.textContent = 'Saving...';
                    if (spinner) spinner.classList.remove('hidden');
                }, false);
            }
        }
    });
</script>