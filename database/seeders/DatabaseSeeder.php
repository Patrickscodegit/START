<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;
use App\Models\ListingImage; // Make sure to use your correct namespace for ListingImage

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Creating a single user
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email'=> 'john@gmail.com'
        ]);

        // Creating listings and associated images for each listing
        Listing::factory(6)->create([
            'user_id' => $user->id
        ])->each(function ($listing) {
            // Assuming the ListingImage factory is set up to automatically link to a listing
            // Adjust the number of images per listing if needed
            ListingImage::factory(3)->create([
                'listing_id' => $listing->id,
            ]);
        });

        // The commented sections for static creation of listings can be removed
        // if the factory-based approach fulfills your requirements

        // Example of static creation (commented out):
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, JavaScript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum...'
        // ]);

        // Additional users or listings can be added in a similar manner
    }
}
