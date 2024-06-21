<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required | unique:brands,name,'. request()->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên brand bắt buộc phải nhập',
            'name.unique' => 'Tên brand đã tồn tại, vui lòng chọn tên khác',
        ];
    }
}
