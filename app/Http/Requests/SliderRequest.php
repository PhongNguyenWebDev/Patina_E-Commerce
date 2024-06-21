<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'event' => 'required',
            'title' => 'required',
            'summary' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'event.required' => 'Event bắt buộc phải nhập',
            'title.required' => 'Tiêu đề bắt buộc phải nhập',
            'summary.required' => 'Mô tả bắt buộc phải nhập',
        ];
    }
}
