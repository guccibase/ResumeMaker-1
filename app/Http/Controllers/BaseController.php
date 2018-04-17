<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Route;

class BaseController extends Controller
{

    /**
     * @var array
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since 2/6/18 12:29 PM
     */
    protected $user;
    protected $routeName;

    /**
     * define all user data for construct and data for header
     *
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since Feb 06, 2017 - 12:32:40 PM
     */
    public function __construct()
    {
        view()->share('login', false);

        if ($this->middleware(function ($request, $next) {

            if (\Sentinel::check()) {

                $userData = \Sentinel::getUser();
                if ($userData) {

                    $this->user = $userData;

                    view()->share('login', true);

                    $ResumeRepository = app(\App\Repositories\ResumeRepository::class);
                    $InformationRepository = app(\App\Repositories\InformationRepository::class);

                    $resumeId = $ResumeRepository->findUser($this->user->id);
                    $information = $InformationRepository->model->select('image')->where('resume_id', $resumeId)->first();

                    view()->share('profile_image', $information->image);
                }

            }

            return $next($request);

        })) ;

        $this->routeName = Route::currentRouteName();

    }

    /**
     * check if login send to home
     * @return $this
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since 2/6/18 2:39 PM
     */
    protected function checkLogin($route = null)
    {
        if (!$route)
            $route = 'home';

        $checkLogin = \Sentinel::check();

        if (isset($checkLogin) && $checkLogin != false)
            return redirect()->route($route)->send();
    }

}