<?php

class Role extends Eloquent {

    protected $table = 'roles';

    protected $hidden = {
    	'created_at',
    	'updated_at'
    };

    public  function users()
    {
    	return $this->hasMany('User');
    }

}