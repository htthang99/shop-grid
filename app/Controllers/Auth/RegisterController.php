<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;

class RegisterController extends BaseController
{

    public function showRegisterForm()
    {
        return $this->render('auth/register');
    }


    public function register()
    {
        $data = $_POST;
        $user = new User();
        $user->fill($data);

        if ($user->validate($data)) {

            $user->password = password_encrypt($user->password);

            if ($user->save()) {
                return $this->render('auth/register-success', [
                    'messages' => [
                        'success' => 'Congratulations!'
                    ]
                ]);
            }

            // failed
            $user->errors['failed'] = 'Something went wrong. Please try again.';
        }

        $params = [
            'username'  => $user->username,
            'email' => $user->email
        ];
        return $this->render('auth/register', ['errors' => $user->errors, 'params' => $params]);
    }
}
