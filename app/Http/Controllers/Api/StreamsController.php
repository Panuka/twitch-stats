<?php

namespace App\Http\Controllers\Api;

use CloudCreativity\JsonApi\Contracts\Http\Requests\RequestInterface;
use CloudCreativity\JsonApi\Contracts\Store\StoreInterface;
use CloudCreativity\LaravelJsonApi\Http\Controllers\CreatesResponses;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StreamsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CreatesResponses;

    /**
     * @param \CloudCreativity\JsonApi\Contracts\Store\StoreInterface $store
     * @param \CloudCreativity\JsonApi\Contracts\Http\Requests\RequestInterface $request
     * @return \Illuminate\Http\Response
     */
    public function index(StoreInterface $store, RequestInterface $request)
    {
        $records = $store->query(
            $request->getResourceType(),
            $request->getParameters()

        );


        return $this->reply()->content($records);
    }

}
