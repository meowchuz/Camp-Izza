<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $path = 'database/sql/countries.sql';
        DB::unprepared(file_get_contents($path));

        DB::table('countries')->update([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
