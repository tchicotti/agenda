<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppointmentRequest extends FormRequest
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
        $appointment = $this->route('appointment');

        $id = null;
        if ($appointment) {
            $id = $appointment->id;
        }

        return [
            'client_id' => ['required'],
            'doctor_id' => ['required'],
            'office_id' => ['required'],
            'status_id' => ['required'],
            'date' => ['required','date','after_or_equal:now',]
        ];
    }
}
