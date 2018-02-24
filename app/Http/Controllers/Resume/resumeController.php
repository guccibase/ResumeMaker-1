<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class resumeController extends Controller
{

    public function create()
    {
        if(!\Sentinel::check())
            return view('resume.main');
        return redirect()->route('profile');
    }

    public function preview(Request $request)
    {

        $credentials = [
            'login' => $request->get('email'),
        ];

        $user = \Sentinel::findByCredentials($credentials);

        if ($user) {

            // show login page

        } else {

            $credentials = [
                'email' => $request->get('email'),
                'password' => 'password',
            ];

            $user = \Sentinel::register($credentials);

            $userId = $user->id;


            $createResume = app(\App\Services\Resume\create::class);
            $res = $createResume->create($request, $userId);

            if($res === true) {
                // return view preview
            } else {
                // show Error
            }

        }




    }

    public function action(Request $request)
    {

        return redirect()->route('resume.view', ['user' => $userId, 'resume' => $resumeId, 'time' => $time]);

    }

    public function resume()
    {

        $createResume = app(\App\Services\Resume\show::class);
        $res = $createResume->show();



    }
}
