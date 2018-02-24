<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

/**
 * Class SignUpController
 * @package App\Http\Controllers\Auth
 * @author Amir Eslamdoust <amireslamdoust@gmail.com>
 * @since 2/6/18 3:46 PM
 */
class SignUpController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since 2/6/18 3:46 PM
     */
    public function create()
    {
        $this->checkLogin();
        //view page
        return view('auth.signup');

    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since 2/6/18 3:46 PM
     */
    public function store(Request $request)
    {
        $this->checkLogin();
        app(\App\Http\Requests\Auth\Signup::class);

        $authService = app(\App\Services\Auth\SignUp::class);

        $result = $authService->signUpAction($request);

        if($result) {

            $remember = true;
            $credentials = [
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ];
            $message = '';
            $login = false;
            try {
                if (\Sentinel::authenticate($credentials, $remember)) {
                    $login = true;
                } else
                    $message = "Email or password incorrect";
            } catch (\Cartalyst\Sentinel\Checkpoints\ThrottlingException $ex) {
                $message = "You are Block";
            } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $ex) {
                $message = "Please Active your account before login";
            }

            if($login) {
                return redirect()->route('profile');
            } else {
                return view('auth.signin')->withErrors($message);
            }
        }

        return view('auth.signup')->withErrors('user already exist');
    }

}