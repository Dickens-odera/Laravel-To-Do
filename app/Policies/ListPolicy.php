<?php

namespace App\Policies;

use App\Lists;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lists  $lists
     * @return mixed
     */
    public function view(User $user, Lists $lists)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->role(),['superadmin'.'user1','user2']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lists  $lists
     * @return mixed
     */
    public function update(User $user, Lists $lists)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lists  $lists
     * @return mixed
     */
    public function delete(User $user, Lists $lists)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lists  $lists
     * @return mixed
     */
    public function restore(User $user, Lists $lists)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lists  $lists
     * @return mixed
     */
    public function forceDelete(User $user, Lists $lists)
    {
        //
    }
}
