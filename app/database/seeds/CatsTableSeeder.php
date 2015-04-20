<?php

class CatsTableSeeder extends Seeder {

  public function run()
  {
    $root1 = Cat::create(['name' => 'Category-1']);
    $child11 = $root1->children()->create(['name' => 'Category-1-1']);
    $child12 = $root1->children()->create(['name' => 'Category-1-2']);

    $root2 = Cat::create(['name' => 'Category-2']);
    $child21 = $root2->children()->create(['name' => 'Category-2-1']);
    $child22 = $root2->children()->create(['name' => 'Category-2-2']);
  }

}
