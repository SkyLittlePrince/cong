<?php

class UserSkill extends \Eloquent {
	
	protected $table = 'user_skill';

   	public $timestamps = false;
	
	protected $fillable = array(
		'skill_id',
		'user_id'
	);
}