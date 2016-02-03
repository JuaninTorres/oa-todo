<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UserRequest extends Request
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
        $ruleEmail = 'required|email|unique:users,email';
        $rulePassword = 'required|confirmed';

        $user = $this->route()->user;
        if($user) {
            $ruleEmail .= ',' . $user->id;
            $rulePassword = 'confirmed';
        }

        return [
            'name' => 'required',
            'email' => $ruleEmail,
            'password' => $rulePassword,
        ];
    }
}
