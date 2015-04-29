<?php

class Product extends \Eloquent {
	protected $fillable = array(
			'name',
			'price',
			'intro',
			'category_id'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);

	public function category()
	{
		return $this->belongsTo('Category');
	}
}