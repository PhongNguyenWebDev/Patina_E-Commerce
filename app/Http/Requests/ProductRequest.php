<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required | unique:products,name,' . request()->id,
            'summary' => 'nullable',
            'colors' => 'required',
            'sizes' => 'required',
            'tags' => 'required',
            'price' => 'required | numeric|max:100000000',
            'sale_price' => 'nullable|numeric|max:100000000',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'name.unique' => 'Tên sản phẩm đã tồn tại, vui lòng chọn tên khác',
            'colors.required' => 'Vui lòng chọn ít nhất một màu sắc cho sản phẩm',
            'sizes.required' => 'Vui lòng chọn ít nhất một kích thước cho sản phẩm',
            'tags.required' => 'Vui lòng chọn ít nhất một thẻ cho sản phẩm',
            'price.required' => 'Giá sản phẩm bắt buộc phải nhập',
            'price.numeric' => 'Giá sản phẩm phải là một số',
        ];
    }
}
