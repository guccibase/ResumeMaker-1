<?php

namespace App\Services\Auth;


/**
 * Class SignUp
 * @author Amir Eslamdoust <amireslamdoust@gmail.com>
 * @since 2/6/18 2:44 PM
 */
class SignUp {


    public function signUpAction($request)
    {
        if ($this->checkUserExist($request->get('email')))
            return false;

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        $mailService = app(\App\Services\Mail\Register::class);

        $user = \Sentinel::registerAndActivate($credentials);
//        $user = \Sentinel::register($credentials);
//        $this->emailVerify($user);

        $mailService->sendWelcomeEmail($user);


        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->phone = $request->get('phone');
        $user->save();


        $roleRepository = app(\App\Repositories\RolesRepository::class);
        $roleUserRepository = app(\App\Repositories\RoleUsersRepository::class);

        $userRole = $roleRepository->getUser();
        $roleUserRepository->store($user->id, $userRole->id);

        return $user->id;

    }

    /**
     * @param string $email
     * @return bool
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since 2/6/18 3:25 PM
     */
    public function checkUserExist($email)
    {
        $credentials = [
            'login' => $email,
        ];

        $user = \Sentinel::findByCredentials($credentials);

        if($user)
            return true;
        return false;
    }

}