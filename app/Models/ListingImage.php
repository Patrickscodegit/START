<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    use HasFactory;

    // If you're not using the default table naming conventions, specify the table name
    protected $table = 'listing_images';

    // If your table doesn't have updated_at and created_at columns, disable them like this
    // public $timestamps = false;

    // Specify the fields that are assignable
    protected $fillable = ['listing_id', 'image_path'];

    /**
     * Define an inverse one-to-many relationship with Listing.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
