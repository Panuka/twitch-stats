<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\IpSecurity
 *
 * @property int $id
 * @property string $ip
 * @property int $is_allowed
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IpSecurity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IpSecurity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IpSecurity whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IpSecurity whereIsAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IpSecurity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IpSecurity extends Model
{
    //
}
