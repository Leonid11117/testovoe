<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\ViewResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ViewController extends Controller
{
    /**
     *
     * @param int $id
     *
     * @return AnonymousResourceCollection
     */
    public function __invoke(int $id): JsonResource
    {
        $lot = Category::query()
            ->whereIn(Category::COLUMN_ID, $id)
            ->firstOrFail();

        return ViewResource::make($lot);
    }
}