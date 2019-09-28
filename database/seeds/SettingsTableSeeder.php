<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = App\Setting::create([

            'site_name' => 'Blog Canvas',
            'site_email'=> 'blog.canvas@email.com',
            'site_contact'=> '880 12232 23 32 22',
            'site_address'=> 'Chandgaon,Chittagong',


        ]);
    }
}
