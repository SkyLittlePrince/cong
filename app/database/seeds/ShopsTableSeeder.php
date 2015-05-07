<?php

class ShopsTableSeeder extends Seeder {

  	public function run()
  	{
		Shop::create([
			'name' => '家天下',
			'user_id' => 1,
			'description' => '家天下廣州分店'
		]);
  	}
}
