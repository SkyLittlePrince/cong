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

	public function Task()
    {
        return $this->belongsTo('Task', 'task_id', 'id');
    }
	
    public static $jobExistsRule = array(
        "job_exist" => array('job_id' => 'exists:job,job_id'),
        "user_exist" => array('user_id' => 'exists:user_info,user_id'),
        "user_cv_exist" => array('cv_id' => 'exists:user_cv,cv_id')
    );
}
