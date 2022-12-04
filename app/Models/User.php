<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{

    use SoftDeletes; // sử dụng  phương thức xoá mềm

    /**
     * Tên bảng, nếu không có thuộc tính này
     * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Sử dụng các thuộc tính created_at và updated_at trong bảng
     *
     * @var boolean
     */
    public $timestamps = true;

    public $errors = [];

    /**
     * Danh sách các thuộc tính để gán hàng loạt (massive assignment)
     * Khi dùng phương thức $model->fill($array) sẽ gán các giá trị trong mảng
     * cho các thuộc tính có trong danh sách fillable . 
     * Phương thức fill() được sử dụng thay thế phương thức set() cho 
     * từng thuộc tính
     *
     * @var array
     */
    protected $fillable  = [
        'username',
        'email',
        'password'
    ];

    /**
     * Validate 
     *
     * @param array $data
     * @return \App\Models\User|boolean|mixed
     */
    public function validate($data = [])
    {
        // validate username
        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if (!preg_match($pattern, $data['username'])) {
            $this->errors['username'] = 'Only letters, numbers, underscore and at least 6 character long allowed.';
        }

        // validate email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }

        // validate password
        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if (!preg_match($pattern, $data['password'])) {
            $this->errors['password'] = 'Password must contains at least one capitalize letter, number and special character.';
        }

        if ($data['password'] != $data['confirm_password']) {
            $this->errors['confirm_password'] = 'Password does not match.';
        }

        // validate username exists
        $user = User::where(['username' => $data['username']])->first();
        if ($user) {
            $this->errors['username'] = 'This username is already taken. Please choose another one.';
        }

        if (count($this->errors)) {
            return false;
        }

        return true;
    }
}
