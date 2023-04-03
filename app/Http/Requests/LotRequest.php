<?php

namespace App\Http\Requests;

use App\Models\Lot;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Foundation\Http\FormRequest;

final class LotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    #[ArrayShape(
        [
            Lot::COLUMN_NAME        => "string",
            Lot::COLUMN_DESCRIPTION => "string",
            Lot::COLUMN_CATEGORY_ID => "integer",
        ]
    )]
    public function rules(): array
    {
        return [
            Lot::COLUMN_NAME        => ['required', 'string', 'max:255'],
            Lot::COLUMN_DESCRIPTION => ['required', 'string', 'max:65535'],
            Lot::COLUMN_CATEGORY_ID => ['required', 'numeric', 'exists:categories,id'],
        ];
    }
}
