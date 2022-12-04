<?php

namespace App\Traits;

use App\Models\User;

trait UserAuthenticateTrait
{

    /**
     * Kiểm tra thông tin user
     * So khớp password == password_hash
     *
     * @param array $credentials
     * @return \App\Models\User|mixed|null
     */
    public function authenticate($credentials)
    {
        $user = User::where(['username' => $credentials['username']])->first();
        if ($user) {
            // kiểm tra mật khẩu nhập với mật khẩu đã băm trong CSDL
            if (password_check($credentials['password'], $user->password)) {

                return $user;
            }

            return null;
        }
        return null;
    }

    public function signout()
    {

        //unset($_SESSION['user']);
        session()->remove('user');

        // xoá cookie bằng cách đặt lại timestamp làm cho nó hết hạn
        if (isset($_COOKIE['credentials'])) {

            setcookie('credentials', null, time() - 3600);
        }
    }
}
