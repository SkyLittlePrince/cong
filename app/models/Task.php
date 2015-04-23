<?php

class Task extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	public $timestamps = true;
    public $primaryKey = 'id';
	public $incrementing = true;

	public function Task()
    {
        return $this->hasOne('Indent', 'task_id', 'id');
    }
}
