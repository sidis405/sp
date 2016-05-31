<?php

namespace Sp\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class UpdateUserProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // dd($this->get('user_id') == \Auth::user()->id);
        return ($this->get('user_id') == \Auth::user()->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'username' => 'required|min:3|max:255|unique:users,id,'.Auth::user()->id,
            'email' => 'required|email|max:255|unique:users,id,'.Auth::user()->id,
        ];
    }
}
