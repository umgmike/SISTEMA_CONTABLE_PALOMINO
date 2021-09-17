<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCuentaValidation extends FormRequest
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
            'nombreCuenta' => 'required|unique:cuenta,nombreCuenta,' . $this->route('id')
        ];
    }

    public function messages()
    {
        return [
            'nombreCuenta.unique' => 'Esta cuenta ya en uso por favor digite una nueva para ser editada'
        ];
    }
}
