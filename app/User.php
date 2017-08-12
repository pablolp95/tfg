<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Get the roles associated to the user
     *
     */
    public function roles()
    {
        return $this
            ->belongsToMany('App\Role')
            ->withTimestamps();
    }

    /**
     * Get the workspaces for the use
     */
    public function workspaces()
    {
        return $this->hasMany('App\Workspace');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var roles
     * @return boolean indicating if the user is
     * authorized to access to a certain resource
     */
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var roles
     * @return boolean indicating if the user is
     * has a the role passed as argument
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var role
     * @return boolean indicating if the user is
     * has a the role passed as argument
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
