<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		foreach (range(1, 40) as $key => $value) {
			
			$users[] = [
				'name'			=>	$faker->name,
				'email'			=>	$faker->email,
				'password'		=>	Hash::make('1'),
				'created_at'   	=> 	date('Y-m-d H-i-s'),
				'updated_at'   	=> 	date('Y-m-d H-i-s')
			];
		}
		
		DB::table('users')->insert($users);
	}
}