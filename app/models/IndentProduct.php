<?php

class IndentProduct extends \Eloquent {
	protected $table = 'indent_product';
	public $timestamps = false;

	protected $fillable = array(
		'indent_id',
		'product_id'
	);
}