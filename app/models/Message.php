<?php

class Message extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';

	public $timestamps = true;
    	public $primaryKey = 'id';
	public $incrementing = true;

	protected $fillable = array(
			'sender',
			'receiver',
			'title',
			'content',
			'type',
			'status'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);

	public function receiver()
	{
              	return $this->belongsTo('User', 'receiver', 'id');
	}
}
