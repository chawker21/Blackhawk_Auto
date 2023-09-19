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


public function setNameAttribute($value)  //<-- these are Mutators -->
	{
	$this->attributes['name'] = ucfirst($value); //<-- capitalizes the   //first letter in user name
	}

public function setPasswordAttribute($value)
{
	$this->attributes['password'] = bcrypt($value);
}
	
public function getNameAttribute($value)
{
	return "User: " . $value;
}

	
public function getEmailAttribute($value)
{
	return strtok($value, '@'); //<-- returns only user name from 
	// Email..  everything before the @symbol
	
}
	public function messages()
	{
		return $this->hasMany(Message::class);
	}
}