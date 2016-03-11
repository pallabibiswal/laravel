<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserDataRequest extends Request
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
            'first'    => 'bail|required|max:30|min:3|alpha',
            'last'     => 'bail|required|max:30|min:3|alpha',
            'middle'   => 'bail|max:30|min:3|alpha',
            'suffix'   => 'bail|max:30|min:3|alpha',
            'employer' => 'bail|max:30|min:3|alpha',
            'dob'      => 'bail|required|date',
            'rstreet'  => 'bail|required|max:30|min:3',
            'rcity'    => 'bail|required|max:30|min:3|alpha',
            'rstate'   => 'bail|required|max:30|min:3|alpha',
            'rphone'   => 'bail|required|numeric',
            'ostreet'  => 'bail|required|max:30|min:3',
            'ocity'    => 'bail|required|max:30|min:3|alpha',
            'ostate'   => 'bail|required|max:30|min:3|alpha',
            'ophone'   => 'bail|required|numeric',
            'photo'   => 'image', 
        ];
    }
}
