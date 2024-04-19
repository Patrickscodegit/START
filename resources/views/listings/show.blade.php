<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-24 bg-black">
            <div class="flex flex-col items-center justify-center text-center">
                <!-- Multiple Images Display -->
                @if($listing->images->count() > 0)
                    <div class="flex flex-wrap justify-center">
                        @foreach ($listing->images as $image)
                            <img class="w-48 mr-6 mb-6" src="{{ asset('storage/' . $image->image_path) }}" alt="Listing Image" />
                        @endforeach
                    </div>
                @else
                    <img class="w-48 mr-6 mb-6" src="{{ asset('/images/no-image.png') }}" alt="No image available" />
                @endif
 <!-- Image display -->
                <div id="imageModal" class="image-modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

                <h3 class="text-2xl mb-2">{{$listing->title}} - {{$listing->company}}</h3>
                <x-listing-tags :tagsCsv="$listing->tags" />
                
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
                <div class="text-lg">
                    <i class="fa-solid fa-envelope"></i> <a href="mailto:{{$listing->email}}" class="underline">Contact via email</a>
                </div>
                <div class="text-lg mb-4">
                    <i class="fa-solid fa-globe"></i> <a href="{{$listing->website}}" target="_blank" class="underline">Visit Website</a>
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Car Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$listing->description}}
                    </div>
                </div>
            </div>
        </x-card>
    </div> 
</x-layout>
