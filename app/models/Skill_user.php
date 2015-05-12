<?php

class Skill_user extends \Eloquent {
	protected $table = 'skill_user';
	
	protected $fillable = array(
			'skill_id',
			'user_id'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);
	public function skills()
	{
		return $this->hasMany('Skill');
	}
}