<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditStoreRequest extends Request
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
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,11}$/',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
            'qq' => 'required|regex:/^[\d]{5,11}$/',
            'age' => 'required|regex:/^[\d]{1,2}$/',
        ];
    }
     public function messages()
    {
        return [
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式错误',
            'phone.required' => '手机必填',
            'phone.regex' => '手机格式错误',
            'qq.required' => 'QQ必填',
            'qq.regex' => 'QQ式错误',
            'age.required' => '年龄必填',
            'age.regex' => '年龄格式错误',
        ];
    }
}
