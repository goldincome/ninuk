<?php

namespace App\Http\Requests\OpeningDurations;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOpeningDurationRequest extends FormRequest
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
            'day_of_week' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required']
            //'status' => ['required']
        ];
    }
}
