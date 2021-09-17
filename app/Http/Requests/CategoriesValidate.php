<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesValidate extends FormRequest
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
            'nombre' => 'required|unique:categoria,nombre,' . $this->route('id')
        ];
    }

    public function messages()
    {
        return [
            'nombre.unique' => 'Naturaleza en uso. Por favor escriba uno nuevo para poder ser registrado'
        ];
    }
}
