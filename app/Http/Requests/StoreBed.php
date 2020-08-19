<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBed extends FormRequest
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
            'bed_name' => 'required',
            'bed_type' => 'required',
            'bed_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'room_id' =>'required',
        ];
    }
}
