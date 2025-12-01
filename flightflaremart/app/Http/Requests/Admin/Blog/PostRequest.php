<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Prepare the data for validation. This handles cleaning and defaulting values.
     */
    protected function prepareForValidation(): void
    {
        $title = $this->input('title');
        $slug = $this->input('slug') ? Str::slug($this->input('slug')) : Str::slug($title);
        
        $mergedData = [
            'slug' => $slug,
        ];

        // Determine if this is an update operation by checking for a route parameter named 'post'
        $isUpdate = $this->route('post') !== null;

        if ($this->has('is_published')) {
            // If 'is_published' is present in the request, use its boolean value.
            // This covers cases where it's checked (1) or a hidden field sends (0).
            $mergedData['is_published'] = $this->boolean('is_published');
        } elseif (!$isUpdate) {
            // If it's a 'store' operation and 'is_published' is not present, default to false.
            $mergedData['is_published'] = false;
        }
        // If it's an 'update' operation and 'is_published' is not present, we deliberately
        // don't add it to mergedData. This means the controller's update method
        // will not attempt to change the post's is_published status.

        // Handle 'published_at' logic.
        // We need to consider the effective 'is_published' status for this.
        // If 'is_published' was explicitly set in the request, use that.
        // Otherwise, for updates, use the existing post's status. For store, use the default false.
        $effectiveIsPublished = $mergedData['is_published'] ?? 
                                ($isUpdate ? $this->route('post')->is_published : false);

        $publishedAtInput = $this->input('published_at');
        $publishedAt = $publishedAtInput; // Start with the input value

        if ($effectiveIsPublished && empty($publishedAtInput)) {
            // If effectively published, but published_at was empty in input, set to now.
            // This also covers cases where 'is_published' was just toggled to true from the form.
            $publishedAt = now();
        } elseif (!$effectiveIsPublished) {
            // If effectively unpublished, ensure published_at is null.
            $publishedAt = null; 
        } 
        // Else, if effectiveIsPublished is true and publishedAtInput is not empty, use publishedAtInput.
        // The default assignment $publishedAt = $publishedAtInput handles this.

        $mergedData['published_at'] = $publishedAt;

        $this->merge($mergedData);
    }

    public function rules(): array
    {
        // Determine the Post ID for unique slug rule exclusion
        $postId = $this->route('post') ? $this->route('post')->id : null;

        return [
            // Assuming 'admins' table is used for authors based on your previous controller code
            'admin_id' => ['required', 'exists:admins,id'], 
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug,' . $postId],
            'content' => ['required', 'string'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'image_url' => ['nullable', 'url', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['boolean'],
        ];
    }
}