<?php

use Illuminate\Database\Seeder;
use App\MenuModel;
class Menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuModel::insert([
            'chaId' => '0',
            'ten' => 'Root',
            'url' => '#',
            'level' => '0',
        ]);
        MenuModel::insert([
            'chaId' => '1',
            'ten' => 'Home',
            'url' => '/home',
            'level' => '0',
        ]);
        MenuModel::insert([
            'chaId' => '1',
            'ten' => 'Blogs',
            'url' => '/blog',
            'level' => '0',
        ]);
        MenuModel::insert([
            'chaId' => '1',
            'ten' => 'About',
            'url' => '/about',
            'level' => '0',
        ]);
        MenuModel::insert([
            'chaId' => '1',
            'ten' => 'Contact',
            'url' => '/contact',
            'level' => '0',
        ]);
        MenuModel::insert([
            'chaId' => '1',
            'ten' => 'CloudTrip',
            'url' => '/cloudtrip',
            'level' => '0',
        ]);
    }
}
