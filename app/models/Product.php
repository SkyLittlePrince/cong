<?php

class Product extends \Eloquent {
	protected $table = 'products';
	protected $fillable = array(
			'name',
			'price',
			'intro',
			'shop_id',
			'avatar'
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

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function scores()
	{
		return $this->hasMany('Score');
	}

	public function indents()
	{
		return $this->belongsToMany('Indent', 'indent_product', 'product_id', 'indent_id');
	}
}