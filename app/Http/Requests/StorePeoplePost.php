<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeoplePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 是否授权
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 规则
     * @return array
     */
    public function rules()
    {
        return [
                 'username' => 'required|unique:people|min:2|max:12',
                 'age' => 'required|numeric|between:1,130',
        ];
    }
    public function messages(){
        return [
                    'username.required' => '名字不能为空',
                    'username.unique' => '名字已存在',
                    'username.min' => '名字长度最小2位',
                    'username.max' => '名字长度最大12位',
                    'age.required' => '年龄不能为空',
                    'age.numeric' => '年龄必须是数字',
                    'age.between' => '年龄不能超过130',
        ];
    }
}
