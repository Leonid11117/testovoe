<?php

namespace App\Http\Requests;

use App\Models\Category;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Foundation\Http\FormRequest;

final class CategoryRequest extends FormRequest
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
            Category::COLUMN_NAME => "string",
        ]
    )]
    public function rules(): array
    {
        return [
            Category::COLUMN_NAME => ['required', 'exists:categories,name']
        ];
    }
}
