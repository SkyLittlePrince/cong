<?php

class Skill extends \Eloquent {
	protected $table = 'skills';

	protected $fillable = array(
			'name'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);
}