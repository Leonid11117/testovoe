<?php

namespace App\Http\Controllers\Lots;

use App\Models\Lot;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

final class DeleteController extends Controller
{
    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $lot = Lot::query()
            ->whereIn(Lot::COLUMN_ID, $id)
            ->firstOrFail();
        $lot->delete();

        return \response()->json([], Response::HTTP_NO_CONTENT);
    }
}