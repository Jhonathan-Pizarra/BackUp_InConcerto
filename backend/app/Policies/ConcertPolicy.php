<?php

namespace App\Policies;

use App\Concert;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConcertPolicy
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
    public function view(User $user, Concert $concert)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    //Permiso de crear
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    //Permiso de actualizar
    public function update(User $user, Concert $concert)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    //Permiso de borrar
    public function delete(User $user, Concert $concert)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    //Permiso de restaurar?
    public function restore(User $user, Concert $concert)
    {
        //
    }

    //Permiso de borrar 4ever
    public function forceDelete(User $user, Concert $concert)
    {
        //
    }

}
