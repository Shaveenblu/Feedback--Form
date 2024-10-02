<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Guide;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the guide can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list guides');
    }

    /**
     * Determine whether the guide can view the model.
     */
    public function view(User $user, Guide $model): bool
    {
        return $user->hasPermissionTo('view guides');
    }

    /**
     * Determine whether the guide can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create guides');
    }

    /**
     * Determine whether the guide can update the model.
     */
    public function update(User $user, Guide $model): bool
    {
        return $user->hasPermissionTo('update guides');
    }

    /**
     * Determine whether the guide can delete the model.
     */
    public function delete(User $user, Guide $model): bool
    {
        return $user->hasPermissionTo('delete guides');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete guides');
    }

    /**
     * Determine whether the guide can restore the model.
     */
    public function restore(User $user, Guide $model): bool
    {
        return false;
    }

    /**
     * Determine whether the guide can permanently delete the model.
     */
    public function forceDelete(User $user, Guide $model): bool
    {
        return false;
    }
}
