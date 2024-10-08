<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotel can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list hotels');
    }

    /**
     * Determine whether the hotel can view the model.
     */
    public function view(User $user, Hotel $model): bool
    {
        return $user->hasPermissionTo('view hotels');
    }

    /**
     * Determine whether the hotel can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create hotels');
    }

    /**
     * Determine whether the hotel can update the model.
     */
    public function update(User $user, Hotel $model): bool
    {
        return $user->hasPermissionTo('update hotels');
    }

    /**
     * Determine whether the hotel can delete the model.
     */
    public function delete(User $user, Hotel $model): bool
    {
        return $user->hasPermissionTo('delete hotels');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete hotels');
    }

    /**
     * Determine whether the hotel can restore the model.
     */
    public function restore(User $user, Hotel $model): bool
    {
        return false;
    }

    /**
     * Determine whether the hotel can permanently delete the model.
     */
    public function forceDelete(User $user, Hotel $model): bool
    {
        return false;
    }
}
