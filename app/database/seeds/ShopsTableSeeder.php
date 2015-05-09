<?php

class ShopsTableSeeder extends Seeder {

  	public function run()
  	{
		Shop::create([
			'name' => '家天下',
			'user_id' => 1,
			'description' => '家天下廣州分店'
		]);

		Shop::create([
			'name' => '100教育',
			'user_id' => 3,
			'description' => '100教育广州分公司'
		]);
  	}
}
