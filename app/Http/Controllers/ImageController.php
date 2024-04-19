<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Listing;
use App\Models\ListingImage;

class ImageController extends Controller
{
    // Store new images for a listing
    public function store(Request $request, $listingId)
    {
        $request->validate([
            'pictures' => 'required|array',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $listing = Listing::findOrFail($listingId);

        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $path = $file->store('public/listings');
                $listing->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return back()->with('message', 'Images uploaded successfully.');
    }

    // Delete a specific image
    public function destroy($imageId)
    {
        $image = ListingImage::findOrFail($imageId);

        // Authorization check: ensure the user owns the listing this image is attached to
        if ($image->listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        if (Storage::delete($image->image_path)) {
            $image->delete();
            return back()->with('message', 'Image deleted successfully.');
        } else {
            Log::error("Failed to delete image file.", ['image_id' => $imageId]);
            return back()->withErrors('Failed to delete the image file.');
        }
    }

    // Replace or add new images to a listing
    public function update(Request $request, $listingId)
    {
        $listing = Listing::findOrFail($listingId);

        // Authorization check: ensure the user owns the listing
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $request->validate([
            'pictures' => 'nullable|array',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Optionally, delete existing images
        // $listing->images()->each(function($image) {
        //     Storage::delete($image->image_path);
        //     $image->delete();
        // });

        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $path = $file->store('public/listings');
                $listing->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return back()->with('message', 'Images updated successfully.');
    }

    // You may also consider adding a method to retrieve all images for a listing if needed
}
