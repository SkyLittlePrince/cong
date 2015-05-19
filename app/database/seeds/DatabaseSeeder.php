<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GroupsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ShopsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('TasksTableSeeder');
		$this->call('IndentsTableSeeder');
		$this->call('IndentProductTableSeeder');
		$this->call('MessagesTableSeeder');
		$this->call('AboutsTableSeeder');
		$this->call('EduExperiencesTableSeeder');
		$this->call('WorkExperiencesTableSeeder');
		$this->call('AwardsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('ShopTagsTableSeeder');
		$this->call('DescriptionTableSeeder');
		$this->call('SellerAuthenticationTableSeeder');
		$this->call('FriendsTableSeeder');
		$this->call('SkillsTableSeeder');
		$this->call('UserSkillsTableSeeder');
		$this->call('PicturesTableSeeder');
		$this->call('EvaluationTableSeeder');
	}

}
