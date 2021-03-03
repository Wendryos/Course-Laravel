<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
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
            'title'   => 'required|min:4|max:160',
            'content' => ['required', 'min:5', 'max:1000'],
        ];
    }

    public function messages() 
    {
        return [
            'title.required' => 'Você deve preencher o campo título!',
            'content.required' => 'Você deve preencher o campo conteúdo!',

        ];
    }

    
}
