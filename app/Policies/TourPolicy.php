<?php

namespace App\Policies;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tour can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list tours');
    }

    /**
     * Determine whether the tour can view the model.
     */
    public function view(User $user, Tour $model): bool
    {
        return $user->hasPermissionTo('view tours');
    }

    /**
     * Determine whether the tour can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create tours');
    }

    /**
     * Determine whether the tour can update the model.
     */
    public function update(User $user, Tour $model): bool
    {
        return $user->hasPermissionTo('update tours');
    }

    /**
     * Determine whether the tour can delete the model.
     */
    public function delete(User $user, Tour $model): bool
    {
        return $user->hasPermissionTo('delete tours');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete tours');
    }

    /**
     * Determine whether the tour can restore the model.
     */
    public function restore(User $user, Tour $model): bool
    {
        return false;
    }

    /**
     * Determine whether the tour can permanently delete the model.
     */
    public function forceDelete(User $user, Tour $model): bool
    {
        return false;
    }
}
