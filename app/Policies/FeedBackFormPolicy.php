<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FeedBackForm;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedBackFormPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the feedBackForm can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the feedBackForm can view the model.
     */
    public function view(User $user, FeedBackForm $model): bool
    {
        return true;
    }

    /**
     * Determine whether the feedBackForm can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the feedBackForm can update the model.
     */
    public function update(User $user, FeedBackForm $model): bool
    {
        return true;
    }

    /**
     * Determine whether the feedBackForm can delete the model.
     */
    public function delete(User $user, FeedBackForm $model): bool
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
     * Determine whether the feedBackForm can restore the model.
     */
    public function restore(User $user, FeedBackForm $model): bool
    {
        return false;
    }

    /**
     * Determine whether the feedBackForm can permanently delete the model.
     */
    public function forceDelete(User $user, FeedBackForm $model): bool
    {
        return false;
    }
}
