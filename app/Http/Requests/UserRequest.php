<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * user rules
     * @return array
     */

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'nullable',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    /**
     * @return array special rules message
     */

    public function messages()
    {
      return [
          'name.required' =>'isim alanı boş bırakılamaz !',
          'email.required' =>'e-posta alanı boş bırakılamaz !',
          'email.unique' =>'bu e-posta daha önce kaydedilmiş !',
          'password.required' =>'parola alanı boş bırakılamaz !',
          'password.min' =>'parola en az 6 karakterden oluşmalı !',
          'password.confirmed' =>'parolalar eşleşmedi !'
      ];
    }
}