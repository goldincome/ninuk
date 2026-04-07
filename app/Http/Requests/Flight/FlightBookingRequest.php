<?php

namespace App\Http\Requests\Flight;

use Illuminate\Foundation\Http\FormRequest;

class FlightBookingRequest extends FormRequest
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
            'depart_date' => ['required'],
            'trip_type' => ['required'],
            'flying_from' => ['required'],
            'flying_to' => ['required'],
            'num_of_adult' => ['required','numeric'],
            'num_of_youth' => ['nullable'],
            'num_of_children' => ['nullable'],
            'num_of_infant' => ['nullable'],
        ];
    }
}
