<?php

class PhotosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		foreach (range(1, 40) as $key => $value) {
			
			$photos[] = [
				'user_id'		=>	$faker->numberBetween(1, 40),
				'caption'		=>	$faker->sentence(2),
				'details'		=>	$faker->text(100),
				'file_url'		=>	$faker->imageUrl($width = 640, $height = 480),
				'created_at'   	=> 	date('Y-m-d H-i-s'),
				'updated_at'   	=> 	date('Y-m-d H-i-s')
			];
		}
		
		DB::table('photos')->insert($photos);
	}
}