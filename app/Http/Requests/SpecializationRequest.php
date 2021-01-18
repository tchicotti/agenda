<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecializationRequest extends FormRequest
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
        $specialization = $this->route('specialization');

        $id = null;
        if ($specialization) {
            $id = $specialization->id;
        }

        return [
            'name' => ['required','min:4','max:191',Rule::unique('specializations')->ignore($id)]
        ];
    }
}
