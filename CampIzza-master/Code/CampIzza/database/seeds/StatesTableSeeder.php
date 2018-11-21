<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $path = 'database/sql/us_states.sql';
        DB::unprepared(file_get_contents($path));

        DB::table('states')->update([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
