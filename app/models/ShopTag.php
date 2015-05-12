<?php

class ShopTag extends \Eloquent {

	public $timestamps = false;
	protected $table = 'shop_tag';
	
	protected $fillable = array(
		'shop_id',
		'tag_id'
	);

	public function tag()
    {
        return $this->belongsTo('Tag', 'task_id', 'id');
    }

    public function shop()
    {
    	return $this->belongsTo("Shop", "shop_id", 'id');
    }
}