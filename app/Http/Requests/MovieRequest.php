<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'year' => 'required|integer|min:1899|max:'.(date('Y')),
            //'image_path' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
            'link_1' => 'required|string|max:255',
            'link_2' => 'string|max:255',
            'description' => 'required|string|max:500',
            'type_id' => 'required|integer',
            'tags.*' => 'integer',
        ];
    }
}
