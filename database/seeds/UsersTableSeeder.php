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
        $user = App\User:: create([

            'name' => 'ReasaT',
            'email' => 're1@gmail.com',
            'password' => bcrypt('147'),
            'admin'    => 1
        ]);


        App\profile:: create([

            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/1.jpg',
            'about'  => 'He is a genious',
            'facebook' => 'facebook.com'

        ]);
    }
}
