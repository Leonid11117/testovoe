<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Categories\ViewResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class CreateController extends Controller
{
    /**
     * @param CategoryRequest $request
     *
     * @return JsonResource
     * @throws \Throwable
     */
    public function __invoke(CategoryRequest $request): JsonResource
    {
        $category = new Category();

        $category->fill([
            Category::COLUMN_NAME => $request->name,
        ]);

        $category->saveOrFail();

        return ViewResource::make($category);
    }
}