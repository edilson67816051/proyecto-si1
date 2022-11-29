<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'codigo'=>'required|numeric|max:99999999',
            'name'=>'required|max:50',
            'stock'=>'required|numeric|max:1000',
            'precio'=>'required|numeric|max:1000',
            'descripcion'=>'max:100',
            'imagen'=>'mimes:jpeg,png,bmp,jfif'
        ];
    }
}
