<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatCuentaValidation extends FormRequest
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
            'nombreCategoria' => 'required|unique:categoria_cuenta,nombreCategoria,' . $this->route('id')
        ];
    }


    public function messages()
    {
        return [
            'nombreCategoria.unique' => 'Este nombre de categoría de cuenta ya esta en uso por favor digite una nueva'
        ];
    }
}
