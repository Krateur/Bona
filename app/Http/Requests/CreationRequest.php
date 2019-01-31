<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:6',
            'content' => 'required',
            'author' => 'required|min:3',
            'image' => 'required|image',
            'category_id' => 'required|integer'
        ];
    }
}
