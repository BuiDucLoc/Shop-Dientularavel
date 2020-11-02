<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sanpham_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tensanpham'=>'required',
            'gia'=>'required',
            // 'anh'=>'required',
        ];
    }
    public function messages(){
        return [
           'tensanpham.required'=>'vui lòng nhập tên sản phẩm',
           'gia.required'=>'vui lòng nhập tên giá tiền',
           // 'anh.required'=>'vui lòng thêm ảnh ảnh',
        ];
    }
}
