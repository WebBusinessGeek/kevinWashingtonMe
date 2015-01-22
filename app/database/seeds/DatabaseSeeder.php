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

		$this->call('ImageTableSeeder');
		$this->command->info('Image Table Seeded!');

		$this->call('ToolTableSeeder');
		$this->command->info('Tool Table Seeded!');

		$this->call('ExperienceTableSeeder');
		$this->command->info('Experience Table Seeded!');

		$this->call('InquiryTableSeeder');
		$this->command->info('Inquiry Table Seeded!');

		$this->call('SkillToolTableSeeder');
		$this->command->info('SkillTool Table Seeded!');
	}


}
