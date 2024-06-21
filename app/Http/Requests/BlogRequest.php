<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'name' => 'required | unique:blogs,name,' . request()->id,
            'author' => 'required',
            'quote' => 'required',
            'content' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc phải nhập',
            'author.required' => 'Tên tác giả bắt buộc phải nhập',
            'quote.required' => 'Quote bắt buộc phải nhập',
            'content.required' => 'Content bắt buộc phải nhập',
        ];
    }
}
