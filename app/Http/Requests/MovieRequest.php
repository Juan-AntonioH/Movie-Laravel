<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'year' => 'required|numeric|min:1890|max:2023',
            'duration' => 'required|numeric|min:60|max:220',
            'director_id' => 'required|exists:directors,id'
            // 'title' => 'required|min:3',
            // 'year' => 'required|numeric|min:4',
            // 'duration' => 'required|numeric|min:0',
            // 'director_id' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'El título es obligatorio',
            'anyo' => 'Pon bien la editorial',
            'duracion' => 'Solo números',
            'director_id' => 'Solo números'
        ];
    }
}
