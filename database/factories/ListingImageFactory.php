<?php

namespace Database\Factories;

use App\Models\ListingImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListingImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Assuming 'listing_id' and 'image_path' are the fields you want to fake
            'listing_id' => \App\Models\Listing::factory(),
            'image_path' => $this->faker->imageUrl(),
        ];
    }
}
