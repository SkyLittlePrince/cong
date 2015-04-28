<?php

class Shop extends \Eloquent {
	protected $fillable = array(
			'name',
			'description',
			'user_id'
		);
	protected $hidden = array(
			'created_at',
			'updated_at'
		);

	$table                          
	                ->foreign('user_id')
	                ->references('id')->on('users') 
	                ->onDelete('cascade')
	                ->onUpdate('cascade');
}