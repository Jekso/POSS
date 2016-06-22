<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 53) as $index)
		{
			User::create([
				"username"		=>	$faker->name ,
				"password"		=>	Hash::make('12345') ,
				"admin_rank"	=>	0
			]);
		}
	}

}