<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\confirm;

class ChangPassRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        return $fail('Mật khẩu cũ không đúng');
                    }
                }
            ],
            'password' => 'required|min:8|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'old_password.required' => 'Mật khẩu cũ bắt buộc phải nhập',
            'password.min' => 'Mật khẩu phải dài hơn 7 ký tự',
            'password.confirmed' => 'Hai mật khẩu không khớp nhau',
        ];
    }
}
