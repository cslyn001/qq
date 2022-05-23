<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        if (!DB::table('cities')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/cities.sql'));
        }

        if (!DB::table('provinces')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/provinces.sql'));
        }

        if (!DB::table('regions')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/regions.sql'));
        }
    }
}
