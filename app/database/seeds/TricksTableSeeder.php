<?php

class TricksTableSeeder extends Seeder {

	public function run()
	{

		$tricks = [
			[
				'title' => 'My First Trick',
				'slug'  => 'my-first-trick',
				'description' => 'This is my first trick! Enjoy!',
				'code' => '<?php namespace Test; ?>',
				'user_id' => '2'
			]
		];

		DB::table('tricks')->insert($tricks);
	}

}
