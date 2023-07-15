<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric',
            'img.*' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => 'กรุณาระบุชื่อสินค้า',
            'amount.required' => 'กรุณาใส่จำนวนสินค้า',
            'price.required' => 'กรุณาใส่ราคา',
            'img.image' => 'กรุณาอัปโหลดไฟล์ภาพเท่านั้น',
            'img.mimes' => 'รองรับเฉพาะไฟล์ png,jpg,jpeg,webp เท่านั้น',
            'img.max' => 'ขนาดไฟล์ไม่ควรเกิน 50kb',
        ];
    }
}
