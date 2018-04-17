<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class resumeController extends BaseController
{

    public function create()
    {
        //if(!\Sentinel::check())
        return view('resume.main');
        // return redirect()->route('profile');
    }

    public function action(Request $request)
    {

        $credentials = [
            'login' => $request->get('email'),
        ];

        $user = \Sentinel::findByCredentials($credentials);

        if ($user) {
            $userId = $user->id;
        } else {
            $credentials = [
                'email' => $request->get('email'),
                'password' => 'password',
            ];
            $user = \Sentinel::registerAndActivate($credentials);
            $userId = $user->id;
        }

        $createResume = app(\App\Services\Resume\create::class);
        $res = $createResume->create($request, $userId);

        if ($res) {

            \Sentinel::loginAndRemember($user);

            return redirect()->route('main.preview');

        } else {

        }


    }


    public function preview()
    {
        $createResume = app(\App\Services\Resume\show::class);
        $res = $createResume->show($this->user->id);

        return view('resume.preview')->with('res', $res);
    }

    public function pdf()
    {
        $createResume = app(\App\Services\Resume\show::class);
        $res = $createResume->show($this->user->id);

        $pdf = \PDF::loadView('resume.view', [
            'information' => $res['information'],
            'experiences' => $res['experiences'],
            'educations' => $res['educations'],
            'skills' => $res['skills'],
            'interest' => $res['interest'],
            'awards' => $res['awards']
        ]);
        $pdf->setPaper('a4');
        return $pdf->stream();
    }
}
