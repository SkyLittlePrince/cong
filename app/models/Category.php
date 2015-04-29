<?php

class Category extends \Eloquent {
	protected $table = 'categories';
	protected $fillable = array(
			'name',
			'intro'
		);
	protected $hidden = array(
			'created_at',
			'updated_at'
		);

	public function products()
	{
		return $this->hasMany('Product');
	}
}