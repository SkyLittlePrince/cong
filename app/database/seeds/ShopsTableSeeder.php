<?php

class ShopsTableSeeder extends Seeder {

  	public function run()
  	{
		Shop::create([
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/avatar.jpg',
			'name' => '家天下',
			'user_id' => 1,
			'description' => '家天下廣州分店'
		]);

		Shop::create([
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/avatar.jpg',
			'name' => '100教育',
			'user_id' => 3,
			'description' => '100教育广州分公司'
		]);
  	}
}
