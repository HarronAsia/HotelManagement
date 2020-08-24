<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotel extends FormRequest
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
            'hotel_name' => 'required',
            'hotel_description' => 'required|min:3',
            'hotel_address' => 'required',
            'hotel_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required',
        ];
    }
}
