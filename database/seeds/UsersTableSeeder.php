<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Armando',
            'email' =>'agileta0@ucol.mx',
            'password' => bcrypt('camila123')
        ]);
    }
}
