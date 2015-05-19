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

	public function receiver()
	{
    return $this->belongsTo('User', 'receiver', 'id');
	}
}
