<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmin extends FormRequest
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
            'name' => 'required|string|max:255|',
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:8',
            'role' => 'required',
            'avatar_background'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avatar_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => '',
            'number' => '',
            'dob' => 'nullable|date_format:Y-m-d|before:today',
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
