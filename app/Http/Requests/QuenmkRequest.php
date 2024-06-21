<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuenmkRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email bắt buộc phải nhập',
            'email.exists' => 'Email này chưa đăng ký trên hệ thống',
        ];
    }
}
