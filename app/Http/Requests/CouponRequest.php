<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'code' => 'required | max:8 |unique:coupons,code,' . request()->id,
            'discount' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'discount_type' => 'required',
            'usage_limit' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Code bắt buộc phải nhập',
            'code.unique' => 'Code đã tồn tại, vui lòng chọn tên code khác',
            'code.max' => 'Code không vượt quá 8 ký tự',
            'discount.required' => 'Discount bắt buộc phải nhập',
            'min_price.required' => 'Giá tối thiểu bắt buộc phải nhập',
            'max_price.required' => 'Giá giảm tối đa bắt buộc phải nhập',
            'discount_type.required' => 'Loại giảm giá bắt buộc phải nhập',
            'usage_limit.required' => 'Giới hạn coupon bắt buộc phải nhập',
            'description.required' => 'Mô tả bắt buộc phải nhập',
            'start_date.required' => 'Ngày bắt đầu bắt buộc phải nhập',
            'end_date.required' => 'Ngày kết thúc bắt buộc phải nhập',
        ];
    }
}
