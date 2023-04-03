<?php

namespace App\Http\Resources\Lots;

use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ViewResource extends JsonResource
{
    /**
     * @param Request     $request
     *
     * @return array
     * @property-read Lot $resource
     */
    public function toArray(Request $request): array
    {
        return [
            Lot::COLUMN_ID          => $this->resource->id,
            Lot::COLUMN_NAME        => $this->resource->name,
            Lot::COLUMN_DESCRIPTION => $this->resource->discription,
            Lot::COLUMN_CATEGORY_ID => $this->resource->category_id,
        ];
    }
}