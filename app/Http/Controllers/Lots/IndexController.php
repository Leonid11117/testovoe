<?php

namespace App\Http\Controllers\Lots;

use App\Models\Lot;
use App\Http\Requests\LotRequest;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Lots\ViewResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class IndexController extends Controller
{
    /**
     *
     * @param LotRequest $request
     *
     * @return AnonymousResourceCollection
     */
    public function __invoke(LotRequest $request): AnonymousResourceCollection
    {
        $lot = QueryBuilder::for(Lot::class)
            ->allowedFilters([Lot::COLUMN_CATEGORY_ID])
            ->orderByDesc(Lot::CREATED_AT)
            ->paginate();

        return ViewResource::collection($lot);
    }
}