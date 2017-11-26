<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StreamingServiceGames extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streaming_service_games', function (Blueprint $table) {
            $table->string('service_game_id');
            $table->integer('service_id');
            $table->integer('game_id');

            $table->primary('service_game_id');
            $table->unique(['service_id', 'game_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streaming_service_games');
    }
}
