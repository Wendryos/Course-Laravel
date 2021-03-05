<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
        $id = $this->segment(2);

        return [
            'title'   => [
            'required', 
            'min:4', 
            'max:160',
             Rule::unique('posts')->ignore($id)
            //"unique:posts,title,{$id},id"
        ],
            'content' => ['nullable', 'min:5', 'max:1000'],
            'image'   => ['required', 'image']
        ];
    }

    public function messages() 
    {
        return [
            'title.unique'   => 'Já existe uma postagem com este titulo cadastrada.',
            'title.required' => 'Você deve preencher o campo título!',
            'image.required' => 'Você deve fornecer uma imagem para o post!'
        ];
    }

    
}
