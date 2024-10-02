<?php

namespace App\Policies;

use App\Models\User;
use App\Models\QuestionCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the questionCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list questioncategories');
    }

    /**
     * Determine whether the questionCategory can view the model.
     */
    public function view(User $user, QuestionCategory $model): bool
    {
        return $user->hasPermissionTo('view questioncategories');
    }

    /**
     * Determine whether the questionCategory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create questioncategories');
    }

    /**
     * Determine whether the questionCategory can update the model.
     */
    public function update(User $user, QuestionCategory $model): bool
    {
        return $user->hasPermissionTo('update questioncategories');
    }

    /**
     * Determine whether the questionCategory can delete the model.
     */
    public function delete(User $user, QuestionCategory $model): bool
    {
        return $user->hasPermissionTo('delete questioncategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete questioncategories');
    }

    /**
     * Determine whether the questionCategory can restore the model.
     */
    public function restore(User $user, QuestionCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the questionCategory can permanently delete the model.
     */
    public function forceDelete(User $user, QuestionCategory $model): bool
    {
        return false;
    }
}
