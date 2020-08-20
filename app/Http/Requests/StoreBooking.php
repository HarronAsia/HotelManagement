<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBooking extends FormRequest
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
            'checkin' => 'required|date',
            'checkout' => 'required|date|after_or_equal:checkin',
            'time_begin' => 'required',
            'time_end' => 'required|after:time_begin',
            'bookable_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
