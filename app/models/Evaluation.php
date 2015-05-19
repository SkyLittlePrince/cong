<?php

class Evaluation extends \Eloquent {
	protected $fillable = array(
			'user_id',
			'product_id',
			'score',
			'content'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);
}