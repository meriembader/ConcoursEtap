<?php

use Illuminate\Database\Seeder;
//use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
      /*  for ($i = 1; $i < 25; $i++) {
            DB::table('cities')->insert(['name' => 'City ' . $i]);
        }
        for ($i = 1; $i < 220; $i++) {
            DB::table('codes')->insert(['codenumber' => 'Code ' . $i, 'city_id' => rand(1, 20)]);
        }*/

    }
}
