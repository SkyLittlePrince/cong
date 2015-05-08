<?php

class Shop extends \Eloquent {

	protected $table = 'shops';
	public $primaryKey = 'id';
	public $incrementing = true;

	public function tags()
	{
		return $this->belongsToMany('Tag', 'shopAndTags', "shop_id", "tag_id");
	}
}