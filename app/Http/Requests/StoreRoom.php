<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoom extends FormRequest
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
        // dd(request()->all());
        return [
            'room_name'=>'required',
            'room_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'room_floor'=>'required',
            'room_number'=>'required',
            'room_price'=>'required',
            'room_type'=>'required',
            'room_condition'=>'required',
            'room_status'=>'required',
            'room_description'=>'required',
            'user_id'=>'required',
            'hotel_id'=>'required',

        ];
    }
}
