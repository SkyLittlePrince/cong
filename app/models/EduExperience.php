<?php

class EduExperience extends \Eloquent {
	protected $table = 'eduExperiences';
	
	protected $fillable = array(
		'user_id',
		'time',
		'description'
		);

	protected $hidden = array(
		'created_at',
		'updated_at'
		);
}