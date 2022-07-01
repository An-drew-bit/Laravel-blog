<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StandartPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:30'],
            'desc' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string', 'max:1000'],
            'category_id' => [
                'required',
                'min:1',
                'integer',
                'exists:categories,id'
            ],
            'thumbnail' => [
                'image',
                'nullable',
                'max:1999',
                'mimes:jpeg,png,jpg,gif,svg'
            ],
            'email' => ['required', 'email', 'exists:users'],
        ];
    }
}
