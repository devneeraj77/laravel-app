<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageAsset;
use App\Models\Post;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;

class ImageAssetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'nullable|url',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'post_id' => 'required|exists:posts,id',
        ]);

        $post = Post::find($request->post_id);

        if ($request->has('image_url')) {
            $imageAsset = new ImageAsset([
                'url' => $request->image_url,
                'is_url' => true,
                'post_id' => $post->id,
                // 'path' => null, // Removed incorrect assignment
            ]);
            $imageAsset->save(); // Corrected line
        } elseif ($request->hasFile('image_upload')) {
            try {
                $uploadedFileUrl = Cloudinary::upload($request->file('image_upload')->getRealPath())->getSecurePath();
                $publicId = Cloudinary::getPublicId();

                $imageAsset = new ImageAsset([
                    'url' => $uploadedFileUrl,
                    'is_url' => false,
                    'post_id' => $post->id,
                    'cloudinary_id' => $publicId,
                ]);
                $imageAsset->save();
            } catch (\Exception $e) {
                Log::error('Cloudinary upload failed in ImageAssetsController store method: ' . $e->getMessage());
                return back()->with('error', 'Image upload failed: ' . $e->getMessage());
            }
        }

        return back()->with('success','Image uploaded successfully.');
    }

    public function update(Request $request, ImageAsset $imageAsset)
    {
        $request->validate([
            'image_url' => 'nullable|url',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->has('image_url')) {
            // If image was from Cloudinary, delete it
            if ($imageAsset->cloudinary_id) {
                Cloudinary::destroy($imageAsset->cloudinary_id);
            }
            $imageAsset->url = $request->image_url;
            $imageAsset->is_url = true;
            $imageAsset->cloudinary_id = null;
        } elseif ($request->hasFile('image_upload')) {
            // If image was from Cloudinary, delete it
            if ($imageAsset->cloudinary_id) {
                Cloudinary::destroy($imageAsset->cloudinary_id);
            }
            try {
                $uploadedFileUrl = Cloudinary::upload($request->file('image_upload')->getRealPath())->getSecurePath();
                $publicId = Cloudinary::getPublicId();

                $imageAsset->url = $uploadedFileUrl;
                $imageAsset->is_url = false;
                $imageAsset->cloudinary_id = $publicId;
            } catch (\Exception $e) {
                Log::error('Cloudinary upload failed in ImageAssetsController update method: ' . $e->getMessage());
                return back()->with('error', 'Image update failed: ' . $e->getMessage());
            }
        } else {
            return back()->with('error', 'No image URL or file provided for update.');
        }

        $imageAsset->save();

        return back()->with('success', 'Image updated successfully.');
    }

    public function destroy(ImageAsset $imageAsset)
    {
        if ($imageAsset->cloudinary_id) {
            Cloudinary::destroy($imageAsset->cloudinary_id);
        }
        $imageAsset->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
