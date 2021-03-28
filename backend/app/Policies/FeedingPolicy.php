<?php

namespace App\Policies;

use App\Feeding;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedingPolicy
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
    public function view(User $user, Feeding $feeding)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de crear
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de actualizar
    public function update(User $user, Feeding $feeding)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de borrar
    public function delete(User $user, Feeding $feeding)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

//Permiso de restaurar?
    public function restore(User $user, Feeding $feeding)
    {
        //
    }

//Permiso de borrar 4ever
    public function forceDelete(User $user, Feeding $feeding)
    {
        //
    }

}
