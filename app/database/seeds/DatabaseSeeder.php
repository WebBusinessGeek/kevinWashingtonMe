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



		$this->call('TagTableSeeder');
		$this->command->info('Tag Table Seeded!');

		$this->call('SuperCategoryTableSeeder');
		$this->command->info('SuperCategory Table Seeded!');

		$this->call('SkillTableSeeder');
		$this->command->info('Skill Table Seeded!');

		$this->call('CategoryTableSeeder');
		$this->command->info('Category Table Seeded!');
	}


}
