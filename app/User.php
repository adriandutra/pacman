<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $primary = 'id';
    
    protected $fillable = [
        'name','username','email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getUser()
    { 
      return $this->id;    
    }
    
    public function roles()
    {
        return $this
        ->belongsToMany('App\Role')
        ->withTimestamps();
    }
    
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }
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
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    
    public function isContable()
    {
         try
         {
             $response = DB::table('users as u')
                             ->Select('u.id')
                             ->join('role_user as ru', 'ru.user.id', '=', 'u.id')
                             ->join('roles as r', 'r.id', '=', 'ru.role_id')
                             ->where('u.id', $this->id)
                             ->where('r.id', '=', 3)
                             ->first();
             
             if($response->id) return true;
         }
         catch(\Exception $e) { return false; }
    }

    public function isAdmin()
    {
        try
        {
            
            $response = DB::table(DB::raw('users as u'))
                          ->Select('u.id')
                          ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
                          ->join('roles as r', 'r.id', '=', 'ru.role_id')
                          ->where('u.id', '=', $this->id)
                          ->where('r.id', 1)
                          ->first();
                           
           
            if($response->id) return true;
        }
        catch(\Exception $e) { return false; }
    }
    
}
