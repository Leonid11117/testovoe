<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
use App\Http\Requests\LotRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\ViewResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class UpdateController extends Controller
{
    /**
     * @param int        $id
     * @param LotRequest $request
     *
     * @return JsonResource
     * @throws \Throwable
     */
    public function __invoke(int $id, LotRequest $request): JsonResource
    {
        $category = Category::query()
            ->whereIn(Category::COLUMN_ID, $id)
            ->firstOrFail();
        $category->fill([
            Category::COLUMN_NAME => $request->name,
        ]);

        $category->saveOrFail();

        return ViewResource::make($category);
    }
}