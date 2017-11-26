<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Streams
 *
 * @property int $id
 * @property int $game_id
 * @property int $streaming_service_id
 * @property int $viewer_count
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Streams whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Streams whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Streams whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Streams whereStreamingServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Streams whereViewerCount($value)
 * @mixin \Eloquent
 * @property int $channel_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Streams whereChannelId($value)
 */
class Streams extends Model
{
    public $timestamps = false;

    public function game() {
//        return $this->hasOne(Game::class);
        return $this->hasOne(Game::class, 'game_id', 'id');
    }



}
