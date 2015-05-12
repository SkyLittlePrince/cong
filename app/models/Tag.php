<?php

class Tag extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

    	public $primaryKey = 'id';
	public $incrementing = true;
   	public $timestamps = false;

   	public function shops()
   	{
   		return $this->belongsToMany('Tag');
   	}

}
