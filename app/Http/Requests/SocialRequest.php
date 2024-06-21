<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
            'name' => 'required',
            'class' => 'required',
            'link' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc phải nhập',
            'class.required' => 'Class bắt buộc phải nhập',
            'link.required' => 'Link bắt buộc phải nhập',
        ];
    }
}
