<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
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
        $category = Category::query()
            ->whereIn(Category::COLUMN_ID, $id)
            ->firstOrFail();
        $category->delete();

        return \response()->json([], Response::HTTP_NO_CONTENT);
    }
}