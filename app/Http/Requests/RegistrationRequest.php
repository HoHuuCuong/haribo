<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class RegistrationRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:50'],
            //'last_name' => ['required', 'min:2', 'max:50'],
            'email' => ['regex:/' . \App\HD::REGIX_EMAIL . '/'],
            'phone' => ['regex:/' . \App\HD::REGIX_PHONE . '/'],
            //'cmnd' => ['required', 'min:9', 'max:12'],
            'address' => ['required', 'min:5', 'max:200'],
            'city_id' => ['required'],
            'district_id' => ['required'],
            'bonus_code' => ['required','unique:customers,bonus_code','regex:/^[a-zA-Z0-9]{9}$/'],
            'attach' => ['required','max:5048','mimes:jpg,bmp,png']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('backend.validate.requied', ['name' => __('First Name')]),
            'name.min' => __('backend.validate.min', ['name' => __('First Name'), 'value' => '5 ' . __('character')]),
            'name.max' => __('backend.validate.max', ['name' => __('First Name'), 'value' => '50 ' . __('character')]),
           // 'cmnd.required' => __('backend.validate.requied', ['name' => __('CMND')]),
            //'cmnd.min' => __('backend.validate.min', ['name' => __('CMND'), 'value' => '9 ' . __('character')]),
            //'cmnd.max' => __('backend.validate.max', ['name' => __('CMND'), 'value' => '12 ' . __('character')]),
            //'cmnd.unique' => __('backend.validate.unique', ['name' => __('CMND')]),
            //'last_name.required' => __('backend.validate.requied', ['name' => __('Last Name')]),
            //'last_name.min' => __('backend.validate.min', ['name' => __('Last Name'), 'value' => '5 ' . __('character')]),
            //'last_name.max' => __('backend.validate.max', ['name' => __('Last Name'), 'value' => '50 ' . __('character')]),
            'email.regex' => __('backend.validate.regix', ['name' => __('Email')]),
            //'email.unique' => __('backend.validate.unique', ['name' => __('Email')]),
            'phone.regex' => __('backend.validate.regix', ['name' => __('Phone')]),
            //'phone.unique' => __('backend.validate.unique', ['name' => __('Phone')]),
            'address.required' => __('backend.validate.requied', ['name' => __('Address')]),
            'address.min' => __('backend.validate.min', ['name' => __('Address'), 'value' => '5 ' . __('character')]),
            'address.max' => __('backend.validate.max', ['name' => __('Address'), 'value' => '200 ' . __('character')]),
            'city_id.required' => __('backend.validate.requied', ['name' => __('City')]),
            'district_id.required' => __('backend.validate.requied', ['name' => __('District')]),
            'bonus_code.required' => __('backend.validate.requied', ['name' => __('Bonus Code')]),
            'bonus_code.regex' => __('Bonus Code').' '.__('bao gồm chữ cái, số và có độ dài 9 ký tự'),
            'bonus_code.unique' => __('backend.validate.unique', ['name' => __('Bonus Code')]),
            //'bonus_code.exists' => __('backend.validate.exists', ['name' => __('Bonus Code')]),
            'attach.required' => __('backend.validate.requied', ['name' => __('Photograph packaging & bonus code')]),
        ];
    }
}
