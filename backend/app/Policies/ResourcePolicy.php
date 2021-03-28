<?php

namespace App\Policies;

use App\Resource;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy
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
    public function view(User $user, Resource $resource)
    {
        return $user->isGranted(User::ROLE_USER);
    }

//Permiso de crear
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_USER);
    }

//Permiso de actualizar
    public function update(User $user, Resource $resource)
    {
        return $user->isGranted(User::ROLE_USER);
    }

//Permiso de borrar
    public function delete(User $user, Resource $resource)
    {
        return $user->isGranted(User::ROLE_USER);
    }

//Permiso de restaurar?
    public function restore(User $user, Resource $resource)
    {
        //
    }

//Permiso de borrar 4ever
    public function forceDelete(User $user, Resource $resource)
    {
        //
    }


}
