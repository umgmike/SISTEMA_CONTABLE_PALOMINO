<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountValidate extends FormRequest
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
            'nombreCuenta' => 'required|unique:cuenta,nombreCuenta,' . $this->route('id'),
            'codigoCuenta' => 'required|unique:cuenta,codigoCuenta,' . $this->route('id')
        ];
    }

    public function messages()
    {
        return [
            'nombreCuenta.unique' => 'Esta cuenta ya esta en uso. Por favor escriba uno nuevo para poder ser registrada',
            'codigoCuenta.unique' => 'Este código ya esta en uso'
        ];
    }
}
