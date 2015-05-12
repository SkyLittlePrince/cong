<?php

class Score extends \Eloquent {
	protected $fillable = array(
			'score',
			'user_id',
			'product_id'
		);

	protected $hidden = array(
			'created_at',
			'updated_at'
		);
}