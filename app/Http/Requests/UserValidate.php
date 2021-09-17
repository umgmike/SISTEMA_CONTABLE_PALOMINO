<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidate extends FormRequest
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
                'nit' => 'required|min:8'. $this->route('id'),
                'usuario' => 'required|min:4'. $this->route('id'),
                'password' => 'nullable|min:8',
                're_password' => 'nullable|required_with:password|min:8|same:password',
                'telefono' => 'nullable|min:8'. $this->route('id'),
            ];
        } else {
            return [
                'nombre' => 'required|max:255',
                'apellido' => 'required|max:255',
                'nit' => 'required|max:8'. $this->route('id'),
                'usuario' => 'required|min:4'. $this->route('id'),
                'password' => 'required|min:8',
                're_password' => 'required|min:8|same:password', 
                'telefono' => 'required|min:8'. $this->route('id'),
            ];
        }
    }


    public function messages()
    {
        return [
            'usuario.unique' => 'Este nombre de usuario ya esta en uso. Por favor escriba uno nuevo para poder ser registrado',
            'nit.unique' => 'El NIT ya esta en uso. Por favor escriba uno nuevo para poder ser registrado',
            'telefono.unique' => 'El núnero de teléfono ya esta en uso. Por favor escriba uno nuevo para poder ser registrado',
            're_password.same' => 'Las contraseñas no coincide',
        ];
    }
}
