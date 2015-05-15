<?php

class Task extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	public $timestamps = true;
    	public $primaryKey = 'id';
	public $incrementing = true;

	public function indent()
	{
              	return $this->hasOne('Indent', 'task_id', 'id');
	}

	public function user()
	{
    		return $this->belongsTo("User", "id", 'user_id');
	}
}
