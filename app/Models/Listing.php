<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];
    
    public function scopeFilter($query, array $filters)
    {
        // Filter by tag
        if (!empty($filters['tag'])) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }
    
        // Filter by search query that applies to title, description, or tags
        if (!empty($filters['search'])) {
            $query->where(function ($subQuery) use ($filters) {
                $subQuery->where('title', 'like', '%' . $filters['search'] . '%')
                         ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                         ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
            });
        }
    
        // Filter by company
        if (!empty($filters['company'])) {
            $query->where('company', 'like', '%' . $filters['company'] . '%');
        }
    
        // Filter by location
        if (!empty($filters['location'])) {
            $query->where('location', 'like', '%' . $filters['location'] . '%');
        }
    }
    

    // Relationship To User
    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
{
    return $this->hasMany(ListingImage::class, 'listing_id'); // Adjust 'listing_id' if your foreign key column has a different name
}


}
