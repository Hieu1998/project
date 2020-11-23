<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(Company_Information::class);
        $this->call(Contact::class);
        $this->call(About::class);
        $this->call(Trips::class);
        $this->call(Menu::class);

    }
}
