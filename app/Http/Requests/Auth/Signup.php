<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class Signup extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @todo change to false
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
}