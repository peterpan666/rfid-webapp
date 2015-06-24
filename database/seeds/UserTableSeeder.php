<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        App\User::create([
            'name' => 'Elie Faes',
            'email' => 'faes.elie@gmail.com',
            'password' => bcrypt('azerty'),
        ]);
    }

}
