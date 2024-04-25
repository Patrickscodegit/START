<section class="relative h-72 bg-laravel flex flex-col justify-center items-center text-center space-y-4 mb-4">
    <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
         style="background-image: url('images/laravel-logo.png')">
    </div>

<div class="z-10">
    <h1 class="text-6xl font-bold uppercase text-white">
        Hollandico <span class="text-black">Luxury cars</span>
    </h1>
    <p class="text-2xl text-gray-200 font-bold my-4">
        Find your Luxury car
    </p>
    <div>
        @if(auth()->check())
            <!-- User is signed in -->
            <a href="/listings/manage"
               class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                Manage Your Listings
            </a>
        @else
            <!-- User is not signed in -->
            <a href="/register"
               class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                Sign Up to List a Luxury Car
            </a>
        @endif
    </div>
    
</div>
</section>


