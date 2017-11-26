<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\StreamInfoLog
 *
 * @property int $id
 * @property int $game_id
 * @property int $streaming_service_id
 * @property int $viewer_count
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StreamInfoLog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StreamInfoLog whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StreamInfoLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StreamInfoLog whereStreamingServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StreamInfoLog whereViewerCount($value)
 * @mixin \Eloquent
 * @property int $channel_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StreamInfoLog whereChannelId($value)
 */
class StreamInfoLog extends Model
{

//    protected $table = 'stream_info_log';



}
