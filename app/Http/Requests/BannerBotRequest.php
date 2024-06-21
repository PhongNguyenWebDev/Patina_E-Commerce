<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerBotRequest extends FormRequest
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
            'category' => 'required',
            'sale' => 'required',
            'link' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc phải nhập',
            'category.required' => 'Danh mục bắt buộc phải nhập',
            'sale.required' => 'Giá Sale bắt buộc phải nhập',
            'link.required' => 'Link bắt buộc phải nhập',
        ];
    }
}
