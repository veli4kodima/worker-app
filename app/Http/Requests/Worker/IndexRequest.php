<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|max:255|string',
            'surname' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'age' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'is_married' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'age.integer' => 'Это поле обязательное для заполнения',
        ];
    }

}
