<?php

namespace App\JsonApi\Streams;

use CloudCreativity\LaravelJsonApi\Schema\EloquentSchema;

class Schema extends EloquentSchema
{

    /**
     * @var string
     */
    protected $resourceType = 'streams';

    /**
     * @var array|null
     */
    protected $attributes = [
        'game_id',
        'channel_id',
        'streaming_service_id',
        'viewer_count',
        'date',
    ];

}

