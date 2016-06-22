<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ReportsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Report::create([
				"petrol_volume"		=>	$faker->randomFloat(null,5,50) ,
				"temperature"		=>	$faker->randomFloat(null,60,120) ,
				"presure"			=>	$faker->randomFloat(null,1,10) ,
				"rig_id"			=>	$index
			]);
		}
	}

}