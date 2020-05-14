<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('upskill_teams')->insert([
            'name' => "Team XYZ",
            'created_by' => 3,
            'updated_by' => 3,
            'status' => 'active'
        ]);
    }
}
