<?php

namespace App\Http\Requests;

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
			'title' => 'required | string | max:25',
			'text' => 'required | string | max:500',
			'attached' => 'image',
		];
    }

    public function messages()
	{
		return [
            'title.required' => 'El titulo es obligatorio',
            'title.max' => 'Maximo 25 caracteres para el titulo',
            'text.required' => 'El comentario es obligatorio',
            'text.max' => 'No puede superar los 500 caracteres',
            'attached.image' => 'La imagen debe ser (jpeg, png, bmp, gif, or svg)'
		];
	}
}
