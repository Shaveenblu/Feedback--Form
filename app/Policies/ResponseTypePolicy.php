<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ResponseType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResponseTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the responseType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list responsetypes');
    }

    /**
     * Determine whether the responseType can view the model.
     */
    public function view(User $user, ResponseType $model): bool
    {
        return $user->hasPermissionTo('view responsetypes');
    }

    /**
     * Determine whether the responseType can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create responsetypes');
    }

    /**
     * Determine whether the responseType can update the model.
     */
    public function update(User $user, ResponseType $model): bool
    {
        return $user->hasPermissionTo('update responsetypes');
    }

    /**
     * Determine whether the responseType can delete the model.
     */
    public function delete(User $user, ResponseType $model): bool
    {
        return $user->hasPermissionTo('delete responsetypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete responsetypes');
    }

    /**
     * Determine whether the responseType can restore the model.
     */
    public function restore(User $user, ResponseType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the responseType can permanently delete the model.
     */
    public function forceDelete(User $user, ResponseType $model): bool
    {
        return false;
    }
}
