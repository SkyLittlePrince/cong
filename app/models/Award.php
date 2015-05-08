<?php

class Award extends \Eloquent {
	protected $table = 'awards';
	
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