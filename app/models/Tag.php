<?php

class Tag extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $fillable = array(
			'name'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);

   	public function shops()
   	{
   		return $this->belongsToMany('Tag');
   	}

}
