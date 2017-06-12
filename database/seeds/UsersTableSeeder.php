<?php

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
        /**
         * Create Dummy User
         */
        $user = [
        	[
        		'name' => 'Kiddie',
        		'email' => 'kiddie@mail.com',
        		'password' => bcrypt('password'),
        	],[
        		'name' => 'Luna',
        		'email' => 'luna@mail.com',
        		'password' => bcrypt('password'),
        	]
        ];

        DB::table('users')->insert($user);
    }
}
