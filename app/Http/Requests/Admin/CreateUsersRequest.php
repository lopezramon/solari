<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsersRequest extends FormRequest
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
        $rules = [
            'name'      => 'required',
            'lastname'  => 'required',
            'email'     => 'required|string|email|max:255|unique:users,email,' . $this->user,
        ];

        if($this->password)
            $rules['password'] = 'required|string|min:8|confirmed';

        if($this->phone)
            $rules['phone'] = 'string|min:11';

        return $rules;
    }
}
