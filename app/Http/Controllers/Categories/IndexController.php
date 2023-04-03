<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
use App\Http\Requests\LotRequest;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Categories\ViewResource;
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
        $category = QueryBuilder::for(Category::class)
            ->allowedSorts('id')
            ->get();

        return ViewResource::collection($category);
    }
}