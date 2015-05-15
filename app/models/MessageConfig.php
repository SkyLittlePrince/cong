<?php

class MessageConfig extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'message_configs';

	public $timestamps = false;

	public function receiver()
	{
    		return $this->belongsTo('User', 'user_id', 'id');
	}
}
