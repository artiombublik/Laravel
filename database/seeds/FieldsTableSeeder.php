<?php

use App\Field;
use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{


        $faker = \Faker\Factory::create();

        Field::create([
            'type'  => '1',
            'label' => 'Credit Card Last 4 Digits',
            'identifier' => 'last_4_digits'
        ]);

        Field::create([
            'type'  => '0',
            'label' => 'Demo Expiration Date',
            'identifier' => 'demo_expiration_date'
        ]);

    }
}
