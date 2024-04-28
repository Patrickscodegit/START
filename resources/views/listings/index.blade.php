<x-layout>
    @include('partials._hero')
    @include('partials._search')
    
    <!-- Filter Form -->
    <div class="mx-4 my-4">
        <form action="{{ route('listings.index') }}" method="GET" class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-2">
            <input type="text" name="search" placeholder="Search by keyword" value="{{ request('search') }}" class="flex-1 p-2 border rounded">
            <input type="text" name="tag" placeholder="Filter by tag" value="{{ request('tag') }}" class="flex-1 p-2 border rounded">
            <input type="text" name="company" placeholder="Search by company" value="{{ request('company') }}" class="flex-1 p-2 border rounded">
            <input type="text" name="location" placeholder="Search by location" value="{{ request('location') }}" class="flex-1 p-2 border rounded">
            <button type="submit" class="bg-blue-500 text-white rounded p-2">Filter</button>
        </form>
    </div>
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($listings) == 0)
            @foreach($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>No listings found</p>
        @endunless
    </div>
    
    <!-- Pagination Links -->
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
    </x-layout>
    