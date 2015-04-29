<?php

class CategoriesTableSeeder extends Seeder {

  public function run()
  {
    $root1 = Category::create(['name' => 'Category-1', 'intro' => 'category-1 intro', 'shop_id' => 1]);

    $root2 = Category::create(['name' => 'Category-2', 'intro' => 'category-2 intro', 'shop_id' => 1]);
  }

}
