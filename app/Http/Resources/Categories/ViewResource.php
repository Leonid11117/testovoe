<?php

namespace App\Http\Resources\Categories;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ViewResource extends JsonResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            Category::COLUMN_NAME,
        ];
    }
}