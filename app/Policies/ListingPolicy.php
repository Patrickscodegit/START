<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any listings.
     */
    public function viewAny(User $user): bool
    {
        // Example: Any authenticated user can view listings
        return true;
    }

    /**
     * Determine whether the user can view the listing.
     */
    public function view(User $user, Listing $listing): bool
    {
        // Example: Anyone can view any listing or restrict based on some condition
        return true;
    }

    /**
     * Determine whether the user can create listings.
     */
    public function create(User $user): bool
    {
        // Example: All registered users can create listings
        return true;
    }

    /**
     * Determine whether the user can update the listing.
     */
    public function update(User $user, Listing $listing): bool
    {
        // Example: Users can update their own listings or admins can update any
        return $user->role === 'admin' || $user->id === $listing->user_id;
    }

    /**
     * Determine whether the user can delete the listing.
     */
    public function delete(User $user, Listing $listing): bool
    {
        // Admins can delete any listings, or users can delete their own listings
        return $user->role === 'admin' || $user->id === $listing->user_id;
    }

    /**
     * Determine whether the user can restore the listing.
     */
    public function restore(User $user, Listing $listing): bool
    {
        // Example: Only admins can restore listings
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the listing.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        // Example: Only admins can permanently delete listings
        return $user->role === 'admin';
    }
}
