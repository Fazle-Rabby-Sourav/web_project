<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		/*
			$table->string('name', 60);
			$table->string('email', 50)->unique();
			$table->integer('can_post');

			$table->increments('id');
			$table->string('role_name');
			$table->timestamps();
		*/
		$categories = [	

					[	
						'cat_name'		=> 'Abstract',
						'created_at' 		=>	date('Y-m-d H-i-s'),
						'updated_at' 		=>	date('Y-m-d H-i-s')

					],

					[	
						'cat_name'		=> 'Black And White',
						'created_at' 		=>	date('Y-m-d H-i-s'),
						'updated_at' 		=>	date('Y-m-d H-i-s')

					],

					[	
						'cat_name'		=> 'Landscape',
						'created_at' 		=>	date('Y-m-d H-i-s'),
						'updated_at' 		=>	date('Y-m-d H-i-s')

					],

					[	
						'cat_name'		=> 'Macro',
						'created_at' 		=>	date('Y-m-d H-i-s'),
						'updated_at' 		=>	date('Y-m-d H-i-s')

					],

					[	
						'cat_name'		=> 'Sport',
						'created_at' 		=>	date('Y-m-d H-i-s'),
						'updated_at' 		=>	date('Y-m-d H-i-s')
					],

				 ];
		DB::table('categories')->insert($categories);
	}
}
