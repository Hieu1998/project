<?php

use Illuminate\Database\Seeder;
use App\TripModel;
class Trips extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TripModel::insert([
            'name' => 'Da Nang',
            'songay' => '1', 
            'sodem' => '1',          
        ]);
        TripModel::insert([
            'name' => 'Quang Ngai',
            'songay' => '1', 
            'sodem' => '1',          
        ]);
        TripModel::insert([
            'name' => 'Hoi An',
            'songay' => '1', 
            'sodem' => '1',          
        ]);
        TripModel::insert([
            'name' => 'Sai Gon',
            'songay' => '1', 
            'sodem' => '1',          
        ]);
    }
}
