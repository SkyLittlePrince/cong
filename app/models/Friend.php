<?php

class Friend extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'friends';

   	public $timestamps = false;

   	public function info()
    	{
        		return $this->belongsTo('User', 'friend_id', 'id');
   	 }
}
