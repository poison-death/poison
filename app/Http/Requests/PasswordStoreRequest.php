<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordStoreRequest extends Request
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
            'upwd' => 'required|regex:/^[\w]{6,12}$/',
            'reupwd' => 'required|same:upwd',
        ];
    }
    public function messages()
    {
        return [
            'upwd.required' => '密码必填',
            'upwd.regex' => '密码格式错误',
            'reupwd.required' =>'确认密码必填',
            'reupwd.same' =>'两次密码不一致',
        ];
    }
}
