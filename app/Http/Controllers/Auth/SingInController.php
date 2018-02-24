<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

/**
 * Class SingInController
 * @package App\Http\Controllers\Auth
 * @author Amir Eslamdoust <amireslamdoust@gmail.com>
 * @since 2/6/18 3:52 PM
 */
class SingInController extends BaseController
{
    public function create()
    {
        $this->checkLogin();

        //view page
        return view('auth.signin');
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
        app(\App\Http\Requests\Auth\SignIn::class);

        $remember = $request->get('remember');

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
            if($request->get('redirect')) {
                return redirect()->route(base64_decode($request->get('redirect')));
            } else
                return redirect()->route('profile');
        } else {
            return view('auth.signin')->withErrors($message);
        }

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since 2/6/18 3:52 PM
     */
    public function destroy()
    {
        \Sentinel::logout();
        return redirect()->route('home');
    }

}