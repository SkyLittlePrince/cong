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
			'name' => '搜狗',
			'user_id' => 2,
			'description' => '搜狗网络科技有限公司'
		]);

		Shop::create([
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/avatar.jpg',
			'name' => '100教育',
			'user_id' => 3,
			'description' => '100教育广州分公司'
		]);

		foreach(range(4, 8) as $index)
		{
			Shop::create([
				'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/avatar.jpg',
				'name' => '100教育',
				'user_id' => $index,
				'description' => '100教育广州分公司'
			]);
		}
  	}
}
