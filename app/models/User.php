<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array(
		'password',
		'remember_token',
		'password',
		'role_id',
		'created_at',
		'updated_at',
		'last_login',
		'permissions',
		'activated',
		'activation_code',
		'persist_code',
		'reset_password_code',
		'activated_at'
		);

	protected $fillable = array(
		'username',
		'email',
		'password',
		'gender',
		'mobile',
		'role_id',
		'qq',
		'wechat',
		'province',
		'city',
		'region',
		'address',
		'description'
		);

	public function addresses()
	{
		return $this->hasMany('Address');
	}

	public function workExperiences()
	{
		return $this->hasMany('WorkExperience');
	}

	public function educationExperiences()
	{
		return $this->hasMany('EducationExperience');
	}

	public function awards()
	{
		return $this->hasMany('Award');
	}

	public function skills()
	{
		return $this->belongsToMany('Skill');
	}
}
