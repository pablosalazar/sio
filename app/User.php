<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employee() {
        return $this->hasOne('App\Employee');
    }

    


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public static function validate($request, $user = null)
    {

        $rules = [
            'name'=>'required',
            'username'=>'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ];

        if (!is_null($user)) 
        {
            $rules['password'] = '';
            $rules['username'] .= ',username,' . $user->id;
            $rules['email'] .= ',email,' . $user->id;
        }

        $messages = [

        ];

        $request->validate($rules, $messages);
    }
}
