<?php

namespace App\Policies;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

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

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Artist  $artist
     * @return mixed
     */

    //Permiso de ver el detalle
    public function view(User $user, Artist $artist)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

    //Permiso de crear
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Artist  $artist
     * @return mixed
     */

    //Permiso de actualizar
    public function update(User $user, Artist $artist)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Artist  $artist
     * @return mixed
     */

    //Permiso de borrar
    public function delete(User $user, Artist $artist)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Artist  $artist
     * @return mixed
     */

    //Permiso de restaurar?
    public function restore(User $user, Artist $artist)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Artist  $artist
     * @return mixed
     */
    public function forceDelete(User $user, Artist $artist)
    {
        //
    }
}
