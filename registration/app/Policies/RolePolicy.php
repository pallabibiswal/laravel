<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Role;

class RolePolicy
{
    use HandlesAuthorization;
    public function update(User $user, Role $role) 
    {
       return $user->role_id = $role->role_id; 
    }
}
