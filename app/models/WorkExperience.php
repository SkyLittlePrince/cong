<?php

class WorkExperience extends \Eloquent {
	protected $table = 'workExperiences';

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