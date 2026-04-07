<?php

namespace App\Http\Requests\Bookings;

use App\Models\ServiceType;
use Illuminate\Foundation\Http\FormRequest;

class PreCheckoutBookingRequest extends FormRequest
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
        $rules =  [
            'user_name' => ['required'],
            'user_email' => ['required','email'],
            'user_phone' => ['required'],
            'date' => ['sometimes'],
            'time' => ['sometimes'],
        ];
        if($this->slug === ServiceType::NPC_ATTESTATION_BIRTH_CERTIFICATE  || 
            $this->slug === ServiceType::NPC_NOTIFICATION_BIRTH_CERTIFICATE){
            $newRules = [
            'birth_location' => ['required', 'string'],
            'applying_for' => ['required', 'string', 'in:myself,children'],
            'children_count' => ['required_if:applying_for,children', 'nullable', 'integer', 'min:1'],
        ];
            return array_merge($rules, $newRules);
        }
        if($this->slug === ServiceType::TAX_IDENTIFICATION_NUMBER){
            $newRules = [
                'applying_for' => ['required', 'string'],
                'company_name' => ['nullable', 'string' ],

            ];
            return array_merge($rules, $newRules);
        }
        return $rules;
    }

 public function messages()
    {
        return [
            'user_name.required' => 'Your full name is required.',
            'user_email.required' => 'Your email address is required.',
            'user_email.email' => 'Please provide a valid email address.',
            'user_phone.required' => 'Your phone number is required.',
            'birth_location.required' => 'Please select where you were born.',
            'applying_for.required' => 'Please select who you are applying for.',
            'applying_for.in' => 'Please select a valid option for who you are applying for.',
            'children_count.required_if' => 'The number of children is required when applying for them.',
            'children_count.integer' => 'The number of children must be a whole number (e.g., 1, 2, 3).',
            'children_count.min' => 'You must apply for at least one child.',
        ];
    }

}
