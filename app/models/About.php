<?php

class About extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'abouts';

   	public $timestamps = false;

   	public function user()
   	{
   		return $this->belongsTo('User');
   	}
}
