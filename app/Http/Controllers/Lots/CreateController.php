<?php

namespace App\Http\Controllers\Lots;

use App\Models\Lot;
use App\Http\Requests\LotRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Lots\ViewResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class CreateController extends Controller
{
    /**
     * @param LotRequest $request
     *
     * @return JsonResource
     * @throws \Throwable
     */
    public function __invoke(LotRequest $request): JsonResource
    {
        $lot = new Lot();

        $lot->fill([
            Lot::COLUMN_NAME        => $request->name,
            Lot::COLUMN_DESCRIPTION => $request->description,
            Lot::COLUMN_CATEGORY_ID => $request->category_id,
        ]);

        $lot->saveOrFail();

        return ViewResource::make($lot);
    }
}