<?php

namespace App\Policies;

use App\Models\CustomerComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerCommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, CustomerComment $customerComment)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, CustomerComment $customerComment)
    {
    }

    public function delete(User $user, CustomerComment $customerComment)
    {
    }

    public function restore(User $user, CustomerComment $customerComment)
    {
    }

    public function forceDelete(User $user, CustomerComment $customerComment)
    {
    }
}
