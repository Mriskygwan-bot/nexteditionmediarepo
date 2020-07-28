<?php

namespace App;

use App\Helpers\Helpers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    public function generateReference()
    {
        $key_length = 16;
        do{
            $reference = Helpers::getAlphaNum($key_length);
        }while(!empty($this->where('ref',$reference)->first()));

        $this->attributes['ref'] = $reference;
    }


    public function generateAlias()
    {
        $str_alias = strtolower($this->attributes['name']);
        $str_alias = str_replace(" ","-",$str_alias);
        $alias_count = User::where('alias','like','%'.$str_alias.'%')->get()->count();

        if($alias_count > 0)
        {
            $str_alias .= $alias_count;
        }

        $this->attributes['alias'] = $str_alias;
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }


}
