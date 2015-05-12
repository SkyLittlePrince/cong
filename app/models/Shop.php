<?php

class Shop extends \Eloquent {
	protected $fillable = array(
		'user_id',
		'name',
		'dscription',
		'url',
		'dealNum',
		'visitNum',
		'credit'
	);

	protected $hidden = array(
		'created_at',
		'updated_at'
	);

	public function products()
	{
		return $this->hasMany('Product');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	}
}