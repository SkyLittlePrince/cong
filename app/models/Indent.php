<?php

class Indent extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'indents';

	public $timestamps = true;
    public $primaryKey = 'id';
	public $incrementing = true;

	public function task()
    {
        return $this->belongsTo('Task', 'task_id', 'id');
    }
}
