<?php

class Indent extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'indents';

	protected $fillable = array(
			'user_id',
			'status'
		);

	public function task()
	{
	        return $this->belongsTo('Task');
	}

	public function products()
	{
		return $this->belongsToMany('Product', 'indent_product', 'indent_id', 'product_id');
	}
}
