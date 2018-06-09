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
        'id', 'name', 'email', 'password','money', 'mobile', 'dob', 'address', 'emailV', 'mobileV', 'docV', 'profile' ,'block', 'code', 'image', 'profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function role()
    {
    return $this->belongsTo('App\Role');
    }

    public function trxs()
    {
        return $this->hasMany(trx::class);
    }

}
