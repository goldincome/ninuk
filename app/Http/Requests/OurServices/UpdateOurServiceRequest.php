<?php

namespace App\Http\Requests\OurServices;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOurServiceRequest extends FormRequest
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
            'service_type_ids' => ['required'],
            'location_id' => ['required'],
            'price' => ['required'],
            //'pvc_print_delivery_cost' => ['required'],
            'our_services_ids' => ['required'],
            'allow_online_payment' => ['sometimes'],
            'slug' => ['sometimes','string'],
            'mystatus' => ['required']
        ];
    }
}
