<?php

use Illuminate\Database\Seeder;
use App\InformationModel;

class Company_Information extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InformationModel::insert([
            'about' => 'Baker Web Development is the combined efforts of two
                        freelance web developers Hayley (design) & Dave (code).
                        We have been working together since 2005.',
            'contact' => '18 Võ Văn Tần',
            'site_info' =>'© 2018 ZoomWorld. All Rights Reserved.',
            'link_facebook' => '#',
            'link_instagram' => '#',
        ]);
    }
}
