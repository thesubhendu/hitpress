<?php

namespace hitpress;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id','role_id','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('hitpress\Role');
    }

    public function photo(){
        return $this->belongsTo('hitpress\Photo');
    }

    public function isAdmin(){
        if($this->role->name=='administrator'){
            return true;
        }else{
            return false;
        }
    }

    public function posts(){
        return $this->hasMany('hitpress\Post');
    }
}
