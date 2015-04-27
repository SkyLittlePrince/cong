<?php

class Message extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'indents';

	public $timestamps = true;
    public $primaryKey = 'id';
	public $incrementing = true;

	public function receiver()
    {
        return $this->belongsTo('User', 'receiver', 'id');
    }
}
