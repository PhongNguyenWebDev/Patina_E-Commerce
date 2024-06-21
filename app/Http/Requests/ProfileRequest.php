<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        return $fail('Mật khẩu không đúng');
                    }
                }
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên bắt buộc phải nhập',
            'name.min' => 'Họ và tên lớn hơn :min ký tự',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email bắt buộc phải nhập',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
        ];
    }
}
