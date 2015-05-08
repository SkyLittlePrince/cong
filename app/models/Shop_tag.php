<?php

class Shop_tag extends \Eloquent {
	protected $fillable = array(
			'shop_id',
			'tag_id'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);
}