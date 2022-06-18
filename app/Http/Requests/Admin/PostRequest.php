<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'author' => ['required', 'string'],
            'title' => ['required', 'string', 'max:40'],
            'desc' => ['required', 'string', 'max:40'],
            'content' => ['required', 'string', 'max:200'],
            'category_id' => ['required', 'integer'],
            'thumbnail' => [
                'image',
                'nullable',
                'max:1999',
                'mimes:jpeg,png,jpg,gif,svg'
            ],
        ];
    }
}
