<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PicturesTableSeeder extends Seeder {

	public function run()
	{
		Picture::create([
			'product_id' => 1,
			'image' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg'
			]);

		Picture::create([
			'product_id' => 1,
			'image' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg'
			]);
	}

}