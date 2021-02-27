<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Captcha_rule;
class user_request extends FormRequest
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
            "ten"=>"required",
            "email"=>"required|email|unique:tbl_customers,customer_email",
            "password"=>"required|min:8",
            "phone"=>"required",
            'g-recaptcha-response' => new Captcha_rule(),
        ];
    }
    public function messages(){
        return [
            'ten.required'=>'vui lòng nhập tên',
            'email.required'=>'vui long nhập email',
            'email.email'=>'vui long nhập email',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'vui lòng nhập pasword ',
            'password.min'=>'mật khẩu phải 8 kí tự trở lên',
            'phone.required'=>'vui lòng nhập sdt',
        ];
    }
}
