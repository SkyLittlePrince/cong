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
			'updated_at',
			'last_login',
			'permissions',
			'activated',
			'activation_code',
			'persist_code',
			'reset_password_code',
			'activated_at',
			'role_id'
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
			'country',
			'address',
			'role_id'
		);
	public function description()
	{
		return $this->hasOne('Description');
	}
	public function addresses()
	{
		return $this->hasMany('Address');
	}

	public function skill_user()
	{
		return $this->hasMany('SkillUser');
	}

	public function workExperiences()
	{
		return $this->hasMany('WorkExperience');
	}

	public function eduExperiences()
	{
		return $this->hasMany('EduExperience');
	}

	public function about()
	{
		return $this->hasOne('About');
	}

	public function awards()
	{
		return $this->hasMany('Award');
	}

	public function messages() 
	{
		return $this->hasMany("Message");
	}

	public function tasks()
	{
		return $this->hasMany("Task");
	}

	public function shop()
	{
		return $this->hasOne('Shop');
	}

	public function products()
	{
		return $this->hasManyThrough('Product','Shop');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function Authentication()
	{
		return $this->hasOne('Authentication');
	}

	public function scores()
	{
		return $this->hasMany('Score');
	}

	public function skills()
	{
		return $this->belongsToMany('Skill', 'user_skill', 'user_id', 'skill_id');
	}
}
