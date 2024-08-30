<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'is_married' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательное для заполнения',
            'name.string' => 'Это поле должно быть строкой',
            'surname.required' => 'Это поле обязательное для заполнения',
            'surname.string' => 'Это поле должно быть строкой',
            'email.required' => 'Это поле обязательное для заполнения',
            'email.email' => 'Это поле должно быть формата электронной почты'
        ];
    }

}
