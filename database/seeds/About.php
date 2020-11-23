<?php

use Illuminate\Database\Seeder;
use App\AboutModel;
use App\AboutElementModel;
class About extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutModel::insert([
            'title' => 'Elementor',
            'content' => 'This theme comes with the easy-to-use Elementor page builder.',
            'link_youtube' => 'https://www.youtube.com/watch?v=9uOETcuFjbE',
        ]);
        AboutElementModel::insert([
            'title' => 'MINIMIZE YOUR',
            'content' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus nec',
            'icon' => 'fa fa-briefcase',
        ]);
        AboutElementModel::insert([
            'title' => 'AUTOMATE REPEATING TASKS',
            'content' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus nec',
            'icon' => 'fa fa-calculator',
        ]);
        AboutElementModel::insert([
            'title' => 'FOLLOW CLIENT PAYMENTS',
            'content' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus nec',
            'icon' => 'fa fa-credit-card',
        ]);
        AboutElementModel::insert([
            'title' => 'SAVED TO THE CLOUD',
            'content' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus nec',
            'icon' => 'fa fa-book',
        ]);
    }
}
