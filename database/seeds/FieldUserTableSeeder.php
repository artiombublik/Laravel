<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	 public function run()
		{

	        $faker = \Faker\Factory::create();

	        DB::table('field_user')->insert([
	            'user_id'  => '1',
	            'field_id'  => '1',
	            'value'  => '1234',
	        ]);

	       DB::table('field_user')->insert([
	            'user_id'  => '2',
	            'field_id'  => '2',
	            'value'  => gmdate('Y-m-d H:i:s',strtotime('+7 days'))
	        ]);
	    }
}
