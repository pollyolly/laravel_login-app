<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
			'fullname' => 'required',
			'gender' => 'required',
			'username' => 'required',
			'password' => 'required|max:16|min:6',
			'email' => 'required|max:100'
        ];
    }

	public function messages(){
		return [
			'fullname.required' => 'Please answer the fullname field.',
			'gender.required' => 'Please answer the gender field.',
			'username.required' => 'Please answer the username field.',
			'password.required' => 'Please answer the password field.',
			'password.max' => 'Password should have only a maximum of 16 characters.',
			'password.min' => 'Password should have a minimum of 6 characters.',
			'email.required' => 'Please answer the email field.',
			'email.max' => 'Email shoudl have only a maximum of 100 characters.'
		];	
	}
}
