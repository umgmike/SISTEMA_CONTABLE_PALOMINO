<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditValidate extends FormRequest
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
        if ($this->route('id')) {
            return [
                'nombre' => 'required|max:255',
                'apellido' => 'required|max:255',
                'nit' => 'required|unique:usuario,nit,' . $this->route('id'),
                'usuario' => 'required|unique:usuario,usuario,' . $this->route('id'),
                'password' => 'nullable|min:8',
                're_password' => 'nullable|required_with:password|min:8|same:password',
                'telefono' => 'nullable|unique:usuario,telefono,' . $this->route('id'),
            ];
        } else {
            return [
                'nombre' => 'required|max:255',
                'apellido' => 'required|max:255',
                'nit' => 'required|unique:usuario,nit,' . $this->route('id'),
                'usuario' => 'required|unique:usuario,usuario,' . $this->route('id'),
                'password' => 'nullable|min:8',
                're_password' => 'nullable|required_with:password|min:8|same:password',
                'telefono' => 'nullable|unique:usuario,telefono,' . $this->route('id'),
            ];
        }
    }

    public function messages()
    {
        return [
            'usuario.unique' => 'Este nombre de usuario ya esta en uso. Por favor escriba uno nuevo para poder ser editado',
            'nit.unique' => 'El NIT ya esta en uso. Por favor escriba uno nuevo para poder ser editado',
            'telefono.unique' => 'El núnero de teléfono ya esta en uso. Por favor escriba uno nuevo para poder ser editado',
            're_password.same' => 'Las contraseñas no coincide',
        ];
    }
}
