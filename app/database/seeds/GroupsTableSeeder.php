<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		Sentry::createGroup(array(
		    'name'        => 'Administrator',
		    'permissions' => array(
		        'user.create' => 1,
		        'user.delete' => 1,
		        'user.view'   => 1,
		        'user.update' => 1
		    ),
		));
	}

}