<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    public function __construct($team)
    {

    }

    public function isMyTeam(User $user , Team $team)
    {
        return $user->id == $team->user_id ;
    }

}
