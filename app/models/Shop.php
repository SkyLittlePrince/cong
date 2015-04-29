<?php

class Shop extends \Eloquent {
	protected $fillable = array(
			'name',
			'description',
			'user_id'
		);
	protected $hidden = array(
			'created_at',
			'updated_at'
		);

	public function categories()
	{
		return $this->hasMany('Category');
	}
}