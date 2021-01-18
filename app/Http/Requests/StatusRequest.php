<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusRequest extends FormRequest
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
        $status = $this->route('status');

        $id = null;
        if ($status) {
            $id = $status->id;
        }

        return [
            'name' => ['required','min:4','max:191',Rule::unique('statuses')->ignore($id)]
        ];
    }
}
