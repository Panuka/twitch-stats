<?php

namespace App\JsonApi\Streams;

use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use CloudCreativity\LaravelJsonApi\Store\EloquentAdapter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use App\Streams;

class Adapter extends EloquentAdapter
{

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new Streams(), $paging);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter(Builder $query, Collection $filters)
    {
        if ($filters->has('game_id')) {
            $query->where('game_id', $filters->get('game_id'));
        }
        if ($filters->has('from')) {
            $query->where('date', '>=', $filters->get('from'));
        }
        if ($filters->has('to')) {
            $query->where('date', '<=', $filters->get('to'));
        }

        return;
    }

    /**
     * @param Collection $filters
     * @return mixed
     */
    protected function isSearchOne(Collection $filters)
    {
        // TODO
    }

}
