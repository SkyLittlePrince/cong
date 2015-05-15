<?php

class Description extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'description';

   	public $timestamps = false;

   	public function user()
   	{
   		return $this->belongsTo('User');
   	}
}
