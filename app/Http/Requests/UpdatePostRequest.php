<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required | min:5 | max:100',
            'body' => 'required | min:5 | max:500',
            'image' => 'nullable | file | image | max:2048',
            'category_id' => 'required | exists:categories,id'
        ];
    }

    // Asegurarnos de que el request está configurado para manejar archivos
    protected function prepareForValidation()
    {
        if ($this->hasFile('image')) {
            $this->merge([
                'image' => $this->file('image')
            ]);
        }
    }
}
