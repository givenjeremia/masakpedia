<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtikelPolicy
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
        return ($user->role_id == '1' ? Response::allow() : Response::deny("Anda Bukan Member."));
    }
}
