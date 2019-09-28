<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $password = Hash::make('aa2016aa');

        User::create([
            'type'  => '1',
            'fname' => 'artiom',
            'lname' => 'live',
            'email' => 'artiom@live.com',
            'password' => $password,
        ]);

        User::create([
            'type'  => '0',
            'fname' => 'artiom',
            'lname' => 'demo',
            'email' => 'artiom@demo.com',
            'password' => $password,
        ]);
    }
}
