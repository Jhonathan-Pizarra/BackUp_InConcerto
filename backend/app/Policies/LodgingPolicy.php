<?php

namespace App\Policies;

use App\Lodging;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LodgingPolicy
{
    use HandlesAuthorization;

    //SuperAdmin
    public function before(User $user, $ability)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }
    }

//Permiso de ver la lista
    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_USER);
    }

//Permiso de ver el detalle
    public function view(User $user, Lodging $lodging)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de crear
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de actualizar
    public function update(User $user, Lodging $lodging)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de borrar
    public function delete(User $user, Lodging $lodging)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de restaurar?
    public function restore(User $user, Lodging $lodging)
    {
        //
    }

//Permiso de borrar 4ever
    public function forceDelete(User $user, Lodging $lodging)
    {
        //
    }

}
