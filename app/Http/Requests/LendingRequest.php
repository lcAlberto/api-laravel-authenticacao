<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LendingRequest extends FormRequest
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
            'value' => 'required|string|min:3|max:100',
            'start_date' => 'required|date_format:Y-m-d H:i:s|before:tomorrow',
            'return_date' => 'required|date_format:Y-m-d H:i:s|after:start_date',
            'car_id' => 'required|string|min:1|max:100',
        ];
    }
}
