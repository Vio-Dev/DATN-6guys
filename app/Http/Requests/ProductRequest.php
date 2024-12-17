<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sale' => 'sometimes|boolean',
            'sale_percentage' => 'required_if:sale,1|nullable|integer|min:1|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá phải là số',
            'price.min' => 'Giá không được âm',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng phải lớn hơn 0',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'content.required' => 'Vui lòng nhập mô tả sản phẩm',
            'image.required' => 'Vui lòng chọn ít nhất một hình ảnh',
            'image.*.image' => 'File phải là hình ảnh',
            'image.*.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif',
            'image.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
            'sale_percentage.required_if' => 'Vui lòng nhập phần trăm giảm giá khi chọn sale',
            'sale_percentage.integer' => 'Phần trăm giảm giá phải là số nguyên',
            'sale_percentage.min' => 'Phần trăm giảm giá phải từ 1% trở lên',
            'sale_percentage.max' => 'Phần trăm giảm giá không được vượt quá 100%',
        ];
    }
}
