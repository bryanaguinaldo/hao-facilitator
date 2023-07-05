<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'role' => 'required|min:1|max:4|numeric|digits_between:1,4',
            'name' => 'required|min:5|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|confirmed',
        ];
    }
}
