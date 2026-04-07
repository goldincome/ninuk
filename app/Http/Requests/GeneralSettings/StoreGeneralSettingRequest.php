<?php

namespace App\Http\Requests\GeneralSettings;

use Illuminate\Foundation\Http\FormRequest;

class StoreGeneralSettingRequest extends FormRequest
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
            'allow_appointment_booking' => ['required'],
            'no_of_access_points_per_duration' => ['required'],
            'duration_per_appointment' => ['required'],
            'nin_capture_price'  => ['required']
        ];
    }
}
