<?php

namespace App\Http\Requests\Bookings;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'user_name' => ['required'],
            'user_email' => ['required','email'],
            'user_phone' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'location_id' => ['exists:locations,id'],
            'our_service_id' => ['required','numeric'],
            'postal_code' => ['nullable'],
            'delivery_address' => ['nullable'],
            // 'duration' => ['required'],
        ];
    }
}
