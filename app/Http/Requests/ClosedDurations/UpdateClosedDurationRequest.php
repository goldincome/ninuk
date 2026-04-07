<?php
namespace App\Http\Requests\ClosedDurations;


use Illuminate\Foundation\Http\FormRequest;

class UpdateClosedDurationRequest extends FormRequest
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
            'title' => 'required',
            'status' => 'required',
            'location_id' => 'required|integer',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
        ];
    }
}
