<?php

namespace App\Policies;

use App\Models\Apartment;
use App\Models\User;

class ApartmentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
     /**
     * Determine whether the user can view the apartment.
     */
    public function view(User $user, Apartment $apartment): bool
    {
        // All users can view any apartment
        return true;
    }

    /**
     * Determine whether the user can update the apartment.
     */
    public function update(User $user, Apartment $apartment): bool
    {
        // Admin can update any apartment, user can only update their own apartments
        return $user->isAdmin() || $user->id === $apartment->user_id;
    }

    /**
     * Determine whether the user can delete the apartment.
     */
    public function delete(User $user, Apartment $apartment): bool
    {
        // Admin can delete any apartment, user can only delete their own apartments
        return $user->isAdmin() || $user->id === $apartment->user_id;
    }
}
