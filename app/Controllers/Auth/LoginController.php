<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

class LoginController extends BaseController
{

    use UserAuthenticateTrait;

    public function showLoginForm()
    {

        // nếu đã login redirect sang home
        if (auth()) {
            redirect("/home");
        }

        $error = [];
        return $this->render('auth/login');
    }

    public function login()
    {
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        if ($user) {

            $user->password = null; // remove password
            //$_SESSION['user'] = serialize($user);
            session()->set('user', serialize($user));

            if (isset($_POST['remember_me'])) {

                // chuyển mảng sang chuỗi để mã hoá
                $str = serialize($credentials);

                // hàm mã hoá chuỗi được định nghĩa trong helpers.
                $encrypted = encrypt($str, ENCRYPTION_KEY);

                // cookie hết hạn 01/12/2021 23:59:59
                setcookie('credentials', $encrypted, mktime(23, 59, 59, 12, 1, 2021));
            }

            session()->setFlash(\FLASH::SUCCESS, 'Login successfully!');
            //redirect('/home');
            $this->redirect('/home');
        }

        $errors[] = 'Username or password is invalid!';

        // nếu login sai show form login và hiển thị lỗi
        return $this->render('auth/login', ['errors' => $errors]);
    }

    public function logout()
    {

        $this->signout();

        $this->session->setFlash(\FLASH::INFO, 'Byte');
        //redirect('/home');
        $this->redirect('/home');
    }

    public function getCredentials()
    {
        return [
            'username'  => $_POST['username'] ?? null,
            'password'  => $_POST['password'] ?? null
        ];
    }
}
