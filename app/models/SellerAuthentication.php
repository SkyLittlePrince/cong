<?php

class SellerAuthentication extends \Eloquent {
	protected $table = 'seller_authentications';

	public function user()
	{
		return $this->belongsTo('User');
	}
}