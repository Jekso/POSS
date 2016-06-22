<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RigsusersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 300) as $index)
		{
			RigsUsers::create([
				"rig_id"	=>	$faker->numberBetween(1,10)	,
				"user_id"	=>	$faker->numberBetween(5,53)
			]);
		}
	}

}