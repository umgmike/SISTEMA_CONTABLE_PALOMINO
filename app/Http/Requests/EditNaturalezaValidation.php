<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNaturalezaValidation extends FormRequest
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
            'nombre.unique' => 'Naturaleza de cuenta ya en uso por favor digite una nueva para ser editada'
        ];
    }
}
