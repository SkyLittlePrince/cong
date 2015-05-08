<?php

class WorkExperience extends \Eloquent {
	protected $table = 'workExperiences';

	protected $fillable = array(
		'user_id',
		'start_time',
		'end_time',
		'description'
		);

	protected $hidden = array(
		'created_at',
		'updated_at'
		);

}