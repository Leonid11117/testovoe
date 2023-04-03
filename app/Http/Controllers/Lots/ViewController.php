<?php

namespace App\Http\Controllers\Lots;

use App\Models\Lot;
use App\Http\Controllers\Controller;
use App\Http\Resources\Lots\ViewResource;
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
        $lot = Lot::query()
            ->whereIn(Lot::COLUMN_ID, $id)
            ->firstOrFail();

        return ViewResource::make($lot);
    }
}