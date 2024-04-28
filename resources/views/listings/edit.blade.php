<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit Listing</h2>
            <p class="mb-4">Editing: {{ $listing->title }}</p>
        </header>

        <form method="POST" action="{{ route('listings.update', $listing->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" value="{{ $listing->company }}" />
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Brand Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{ $listing->title }}" placeholder="Example: Rolls-Royce" />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{ $listing->location }}" placeholder="e.g., Berlin, Germany" />
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ $listing->email }}" />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website/Application URL</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{ $listing->website }}" />
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{ $listing->tags }}" placeholder="e.g., Luxury, Collector, Vintage" />
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Car Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include details like condition, year, mileage">{{ $listing->description }}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Images Section -->
            <h3 class="text-lg font-bold mb-2">Current Images</h3>
            <div class="grid grid-cols-3 gap-4 mb-6">
                @foreach ($listing->images as $image)
                <div class="relative">
                    <img src="{{ Storage::url($image->image_path) }}" alt="Image" class="w-full h-auto rounded-md">
                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" class="absolute top-2 right-2" id="delete_image_{{ $image->id }}">
                    <label for="delete_image_{{ $image->id }}" class="absolute top-2 right-2 bg-white p-1 rounded-full cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </label>
                </div>
                @endforeach
            </div>

            <!-- Add More Pictures Input -->
            <div class="mb-6">
                <label for="pictures" class="inline-block text-lg mb-2">Add More Pictures</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="pictures[]" multiple />
                @error('pictures')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="mb-6 text-right">
                <button type="submit" class="bg-laravel !important text-white rounded py-2 px-4 hover:bg-black">Update Listing</button>
                <a href="/" class="text-black ml-4">Back</a>
            </div>
        </form>
    </x-card>
</x-layout>


