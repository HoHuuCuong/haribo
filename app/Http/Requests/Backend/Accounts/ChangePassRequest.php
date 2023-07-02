<?php

namespace App\Http\Requests\Backend\Accounts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\EqualPwd;
use Illuminate\Support\Facades\Auth;

class ChangePassRequest extends FormRequest
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
            'oldpwd' => [
                'required', 'min:5', 'max:28',
                new EqualPwd(Auth::guard('backend')->user()->password, __('backend.validate.equalpwd', ['name' => __('backend.label.oldpassword')]))
            ],
            'pwd' => ['required', 'min:5', 'max:28', 'regex:/' . \App\HD::REGIX_PASSWORD . '/'],
            'pwd_confirmation' => 'required|min:5|max:28|same:pwd'
        ];
    }
    public function messages()
    {
        return [
            'oldpwd.required' => __('backend.validate.requied', ['name' => __('backend.label.oldpassword')]),
            'oldpwd.min' => __('backend.validate.min', ['name' => __('backend.label.oldpassword'), 'value' => '5 ' . __('character')]),
            'oldpwd.max' => __('backend.validate.max', ['name' => __('backend.label.oldpassword'), 'value' => '28 ' . __('character')]),
            'pwd.required' => __('backend.validate.requied', ['name' => __('backend.label.password')]),
            'pwd.min' => __('backend.validate.min', ['name' => __('backend.label.password'), 'value' => '5 ' . __('character')]),
            'pwd.max' => __('backend.validate.max', ['name' => __('backend.label.password'), 'value' => '28 ' . __('character')]),
            'pwd.regex' => __('backend.validate.passhightlv', ['name' => __('backend.label.password'), 'value' => '28 ' . __('character')]),
            'pwd_confirmation.required' => __('backend.validate.requied', ['name' => __('backend.label.confirm')]),
            'pwd_confirmation.min' => __('backend.validate.min', ['name' => __('backend.label.confirm'), 'value' => '5 ' . __('character')]),
            'pwd_confirmation.max' => __('backend.validate.max', ['name' => __('backend.label.confirm'), 'value' => '28 ' . __('character')]),
            'pwd_confirmation.same' => __('backend.validate.confirmed', ['name' => __('backend.label.confirm'), 'parent' => __('backend.label.password')]),
        ];
    }
}