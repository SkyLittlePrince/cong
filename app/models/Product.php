<?php

class Product extends \Eloquent {
	protected $fillable = array(
			'name',
			'price',
			'intro',
			'shop_id'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);

	public function shop()
	{
		return $this->belongsTo('Shop');
	}

	public function pictures()
	{
		return $this->hasMany('Picture');
	}
}