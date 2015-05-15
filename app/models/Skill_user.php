<?php

class Skill_user extends \Eloquent {

	protected $fillable = array(
			'skill_id',
			'user_id'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);

}