<?php

namespace App\Policies;

use App\Festival;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FestivalPolicy
{
    use HandlesAuthorization;

    //SuperAdmin
    public function before(User $user, $ability)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }
    }

   //Permiso de ver la lista de festivals
    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    //Permiso de ver el detalle
    public function view(User $user, Festival $festival)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    //Permiso de crear festival
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    //Permiso de actualizar festival
    public function update(User $user, Festival $festival)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    //Permiso de borrar
    public function delete(User $user, Festival $festival)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    //Permiso de restaurar?
    public function restore(User $user, Festival $festival)
    {
        //
    }

    //Permiso de borrar 4ever
    public function forceDelete(User $user, Festival $festival)
    {
        //
    }


}
