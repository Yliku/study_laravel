<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
        var_dump($this->route('user')); //输出User的实例
        //如果控制器的方法中没有绑定 File 类，将获得user参数的值
        return [
            //
        ];
    }
}
