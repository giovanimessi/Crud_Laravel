<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //tem que ser true
        //php artisan make:request storeUpdatePost
        //validação do store
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //para validação dos campos
            'title' =>'required|min:3|max:160',
            'content' =>['required','min:3','max:160']
        ];
    }
}
