<?php

class ShopAndTag extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shopAndTags';
   	public $timestamps = false;

	public function tag()
    {
        return $this->belongsTo('Tag', 'task_id', 'id');
    }

    public function shop()
    {
    	return $this->belongsTo("Shop", "shop_id", 'id');
    }
}
