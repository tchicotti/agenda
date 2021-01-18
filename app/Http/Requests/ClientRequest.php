<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
        $client = $this->route('client');

        $id = null;
        if ($client) {
            $id = $client->id;
        }

        return [
            'firstname' => ['required','min:1','max:191',Rule::unique('clients')->ignore($id)],
            'lastname' => ['required','min:1','max:191'],
            'email' => ['required','min:5','max:191', 'email'],
            'birthdate' => ['required','date'],
            'personal_phone' => ['required', 'regex:/^\s*(\d{2}|\d{0})[-. ]?(\d{5}|\d{4})[-. ]?(\d{4})[-. ]?\s*$/m'],
            'contact_phone' => ['regex:/^\s*(\d{2}|\d{0})[-. ]?(\d{5}|\d{4})[-. ]?(\d{4})[-. ]?\s*$/m']
        ];
    }

    public function attributes() {
        return [
            'personal_phone' => 'personal phone',
            'contact_phone' => 'contact phone',
        ];
    }
}
