<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfficeRequest extends FormRequest
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
        $office = $this->route('office');

        $id = null;
        if ($office) {
            $id = $office->id;
        }

        return [
            'name' => ['required','min:1','max:191',Rule::unique('offices')->ignore($id)],
            'street_address' => ['required','min:1','max:191'],
            'city' => ['required','min:1','max:191'],
            'state' => ['required','min:1','max:191'],
            'country' => ['required','min:1','max:191'],
        ];
    }
}
