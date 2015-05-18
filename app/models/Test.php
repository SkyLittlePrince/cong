<?php

class Test extends \Eloquent {
	protected $fillable = [];
	public function user()
	{
		return $this->belongsTo('User');
	}
}