<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title_ua' => 'required|string|max:255',
            'title_original' => 'required|string|max:255',
            'is_published' => 'required|integer',
            'year' => 'required|integer|min:1899|max:'.(date('Y')),
            'image_path' => 'nullable|file',
            'link_1' => 'required|string|max:255',
            'link_2' => 'string|max:255',
            'description' => 'required|string|max:500',
            'type_id' => 'required|integer|exists:types,id',
            'tags.*' => 'integer|exists:tags,id',
        ];
    }
}
