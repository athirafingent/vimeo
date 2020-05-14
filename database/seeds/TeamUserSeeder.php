<?php

use Illuminate\Database\Seeder;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('upskill_team_users')->insert([
            'team_id' => 1,
            'user_id' => 3
        ]);
    }
}
