<?php

class Shop extends \Eloquent {
	protected $fillable = array(
		'user_id',
		'name',
		'dscription',
		'avatar',
		'dealNum',
		'visitNum',
		'credit'
	);

	protected $hidden = array(
		'created_at',
		'updated_at'
	);

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function products()
	{
		return $this->hasMany('Product');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}