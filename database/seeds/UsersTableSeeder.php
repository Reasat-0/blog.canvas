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
        App\User:: create([

            'name' => 'ReasaT',
            'email' => 're1@gmail.com',
            'password' => bcrypt('147')

        ]);
    }
}
