<?php
namespace App\Http\Requests\ReminderSettings;


use Illuminate\Foundation\Http\FormRequest;

class UpdateReminderSettingRequest extends FormRequest
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
           'number_of_days' => 'required|integer|unique:reminder_settings,number_of_days,' . $this->number_of_days,
            'status' => 'required|integer',
        ];
    }
}
