<?php
namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class Reset extends Request
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
            'password' => 'required',
            'confirm' => 'required|same:password|min:8'
        ];
    }
}