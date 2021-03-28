<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    //Atributos a llenar
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //Definción de roles
    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    private const ROLES_HIERARCHY = [
        self::ROLE_SUPERADMIN => [self::ROLE_ADMIN],
        self::ROLE_ADMIN => [self::ROLE_USER],
        self::ROLE_USER => []
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Implementación de metodos JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    //Tiene permiso
    public function isGranted($role)
    {
        if ($role === $this->role) {
            return true;
        }
        return self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$this->role]);
    }

    //Función para consultar los permisos de un usuario: permisos de superadmin, de admin o usuario
    private static function isRoleInHierarchy($role, $role_hierarchy)
    {
        if (in_array($role, $role_hierarchy)) {
            return true;
        }
        foreach ($role_hierarchy as $role_included) {
            if (self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$role_included])) {
                return true;
            }
        }
        return false;
    }


    //Relación Hospedaje-Admins(Users)
    public function lodgings()
    {
        return $this->belongsToMany('App\Lodging'); //Eloquent determina la FK automáticamente
    }

    //Relación Alimentacion-Usuario
    public function feedings()
    {
        return $this->hasMany('App\Feeding'); //Eloquent determina la FK automáticamente
    }

    //Relación Admins-Calendario
    public function calendars()
    {
        return $this->belongsToMany('App\Calendar');//Eloquent determina la FK automáticamente
    }

    //Relación AdcitivadesFestival-Responsables(Users)
    public function activities()
    {
        return $this->hasMany('App\ActivityFestival'); //Eloquent determina la FK automáticamente

    }


}
