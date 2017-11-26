<?php

use Illuminate\Database\Seeder;

class DemoSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addGameForTwitch('Horizon Zero Dawn', 1);
        $this->addGameForTwitch('World of Warcraft', 2);
        DB::table('streaming_services')->insert([
            'id' => 1,
            'title' => 'Twitch',
            'is_enable' => true,
        ]);
    }

    private function addGameForTwitch($title, $id) {
        DB::table('games')->insert([
            'id' => $id,
            'title' => $title,
        ]);
        DB::table('streaming_service_games')->insert([
            'service_game_id' => $title,
            'service_id' => 1,
            'game_id' => $id,
        ]);
    }

}
