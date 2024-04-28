<x-layout>
    <!-- Back Link -->
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <!-- Image Gallery -->
    <div class="container mx-auto mt-8">
        <div id="lightgallery" class="grid grid-cols-3 gap-4">
            @if($listing->images->count() > 0)
                @foreach ($listing->images as $image)
                    <a href="{{ asset('storage/' . $image->image_path) }}" data-sub-html="{{ $listing->title }}">
                        <img class="h-48 w-full object-cover" src="{{ asset('storage/' . $image->image_path) }}" alt="Listing Image">
                    </a>
                @endforeach
            @else
                <img class="h-48 w-full object-cover" src="{{ asset('/images/no-image.png') }}" alt="No image available">
            @endif
        </div>
    </div>

    <!-- Card Container -->
    <x-card class="p-24 bg-black mx-4">
        <div class="flex flex-col items-center justify-center text-center">
            <!-- Listing Information -->
            <h3 class="text-2xl mb-2">{{ $listing->title }} - {{ $listing->company }}</h3>
            <x-listing-tags :tagsCsv="$listing->tags" />

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
            <div class="text-lg">
                <i class="fa-solid fa-envelope"></i> <a href="mailto:{{ $listing->email }}" class="underline">Contact via email</a>
            </div>
            <div class="text-lg mb-4">
                <i class="fa-solid fa-globe"></i> <a href="{{ $listing->website }}" target="_blank" class="underline">Visit Website</a>
            </div>

            <div class="border-t border-gray-200 w-full my-6"></div>

            <!-- Description Section -->
            <div>
                <h3 class="text-3xl font-bold mb-4">Car Description</h3>
                <div class="text-lg space-y-6">
                    {{ $listing->description }}
                </div>
            </div>
        </div>
    </x-card>
    @vite('resources/js/gallery.js')
</x-layout>
