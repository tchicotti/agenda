<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
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
        $doctor = $this->route('doctor');

        $id = null;
        if ($doctor) {
            $id = $doctor->id;
        }

        return [
            'firstname' => ['required','min:1','max:191',Rule::unique('doctors')->ignore($id)],
            'lastname' => ['required','min:1','max:191'],
            'crm' => ['required','min:5','max:191'],
            'gender' => ['required',Rule::in(['M', 'F'])]
        ];
    }
}
