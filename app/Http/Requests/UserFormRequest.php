<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required|max:30',
            'name' => 'required|min:4',
            'password' => 'required|max:25',
            'password' => 'required|min:6',
            'activo' => 'required|max:1',
            'activo' => 'required|min:1',

        ];
    }
}
