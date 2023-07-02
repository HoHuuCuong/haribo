<?php

namespace App\Http\Requests\Backend\Accounts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
            'username' => 'required|min:1|max:30',
            'pwd' => 'required|min:5|max:28'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => __('backend.validate.requied', ['name' => __('backend.label.username')]),
            'username.alpha_dash' => __('backend.validate.alpha_dash', ['name' => __('backend.label.username')]),
            'username.min' => __('backend.validate.min', ['name' => __('backend.label.username'), 'value' => '1 ký tự']),
            'username.max' => __('backend.validate.max', ['name' => __('backend.label.username'), 'value' => '30 ký tự']),
            'pwd.required' => __('backend.validate.requied', ['name' => __('backend.label.password')]),
            'pwd.min' => __('backend.validate.min', ['name' => __('backend.label.password'), 'value' => '5 ký tự']),
            'pwd.max' => __('backend.validate.max', ['name' => __('backend.label.password'), 'value' => '28 ký tự']),
        ];
    }
}
