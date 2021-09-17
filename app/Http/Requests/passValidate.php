<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passValidate extends FormRequest
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
                'password' => 'nullable|min:8',
                're_password' => 'nullable|required_with:password|min:8|same:password'
            ];
        } else {
            return [
                'password' => 'required|min:8',
                're_password' => 'required|min:8|same:password'
            ];
        }
    }

    public function messages()
    {
        return [
            're_password.same' => 'La contraseña no coincide'
        ];
    }
}
