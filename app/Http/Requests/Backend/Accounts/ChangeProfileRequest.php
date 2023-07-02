<?php

namespace App\Http\Requests\Backend\Accounts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChangeProfileRequest extends FormRequest
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
        $user = auth('backend')->user();
        return [
            'name' => ['required', 'min:5', 'max:50'],
            'email' => ['required', 'min:5', 'max:50', 'regex:/' . \App\HD::REGIX_EMAIL . '/', 'unique:hd_accounts,email,' . $user->id],
            'phone' => ['required', 'min:10', 'max:10', 'regex:/' . \App\HD::REGIX_PHONE . '/', 'unique:hd_accounts,phone,' . $user->id]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('backend.validate.requied', ['name' => __('backend.label.name')]),
            'name.min' => __('backend.validate.min', ['name' => __('backend.label.name'), 'value' => '5 ' . __('character')]),
            'name.max' => __('backend.validate.max', ['name' => __('backend.label.name'), 'value' => '50 ' . __('character')]),
            'email.required' => __('backend.validate.requied', ['name' => __('backend.label.email')]),
            'email.min' => __('backend.validate.min', ['name' => __('backend.label.email'), 'value' => '5 ' . __('character')]),
            'email.max' => __('backend.validate.max', ['name' => __('backend.label.email'), 'value' => '50 ' . __('character')]),
            'email.regex' => __('backend.validate.regix', ['name' => __('backend.label.email')]),
            'email.unique' => __('backend.validate.unique', ['name' => __('backend.label.email')]),
            'phone.required' => __('backend.validate.requied', ['name' => __('backend.label.phone')]),
            'phone.min' => __('backend.validate.min', ['name' => __('backend.label.phone'), 'value' => '10 ' . __('character')]),
            'phone.max' => __('backend.validate.max', ['name' => __('backend.label.phone'), 'value' => '10 ' . __('character')]),
            'phone.regex' => __('backend.validate.regix', ['name' => __('backend.label.phone')]),
            'phone.unique' => __('backend.validate.unique', ['name' => __('backend.label.phone')]),
        ];
    }
}