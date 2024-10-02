<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CustomerFormUrl;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerFormUrlPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the customerFormUrl can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the customerFormUrl can view the model.
     */
    public function view(User $user, CustomerFormUrl $model): bool
    {
        return true;
    }

    /**
     * Determine whether the customerFormUrl can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the customerFormUrl can update the model.
     */
    public function update(User $user, CustomerFormUrl $model): bool
    {
        return true;
    }

    /**
     * Determine whether the customerFormUrl can delete the model.
     */
    public function delete(User $user, CustomerFormUrl $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the customerFormUrl can restore the model.
     */
    public function restore(User $user, CustomerFormUrl $model): bool
    {
        return false;
    }

    /**
     * Determine whether the customerFormUrl can permanently delete the model.
     */
    public function forceDelete(User $user, CustomerFormUrl $model): bool
    {
        return false;
    }
}
