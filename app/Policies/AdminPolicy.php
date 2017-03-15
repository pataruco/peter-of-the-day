<?php

namespace App\Policies;

use App\User;
use App\Day;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the day.
     *
     * @param  \App\User  $user
     * @param  \App\Day  $day
     * @return mixed
     */
    public function view(User $user, Day $day)
    {
        //
    }

    /**
     * Determine whether the user can create days.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the day.
     *
     * @param  \App\User  $user
     * @param  \App\Day  $day
     * @return mixed
     */
    public function update(User $user, Day $day)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the day.
     *
     * @param  \App\User  $user
     * @param  \App\Day  $day
     * @return mixed
     */
    public function delete(User $user, Day $day)
    {
        return $user->is_admin;
    }
}
