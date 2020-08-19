<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
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
            'user_id' => 'required',
            'avatar_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => '',
            'number' => '',
            'dob' => 'nullable|date_format:Y-m-d|before:today',
            'gender' => '',
            'place' => '',
            'job' => '',
            'blood' => '',
            'relationship' => '',
            'bio' => '',
            'google_plus_link' => '',
            'yahoo_link' => '',
            'skype_link' => '',
            'facebook_link' => '',
            'twitter_link' => '',
            'instagram_link' => '',
        ];
    }
}
