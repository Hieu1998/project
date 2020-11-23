<?php

use Illuminate\Database\Seeder;
use App\contactModel;
class Contact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        contactModel::insert([
            'address' =>'12 Fake Street, Melbourne, 3000',
            'phone' =>'1300 555 555',
            'email' =>'admin@example.com',
            'working_time' =>'9:00am – 5:30pm Monday to Friday',
            'link_facebook' =>'#',
            'link_twitter' =>'#',
            'link_Google' =>'#',
            'link_skype' =>'#',
            'link_youtube' =>'#',
        ]);
    }
}
