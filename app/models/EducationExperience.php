<?php

class EducationExperience extends \Eloquent {
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