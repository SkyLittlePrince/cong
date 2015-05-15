<?php

class Skill extends \Eloquent {
	protected $table = 'skills';


   	public $timestamps = false;


	protected $fillable = array(
		'name'
	);
}