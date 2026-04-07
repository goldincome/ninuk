<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageFormRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['nullable'],
            'subject' => ['nullable'],
            'message' => ['required'],
            'location_id' => ['required'],
            'captcha' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'location_id' => 'Select Location is required',
            'captcha.captcha' => 'Captcha verification failed'
        ];
    }
}
