<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResepPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function checkmember(User $user)
    {
        return ($user->role_id == '2' ? Response::allow() : Response::deny("Anda Bukan Admin."));
    }
}
