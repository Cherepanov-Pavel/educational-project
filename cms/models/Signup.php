<?php

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;
    public $username;

    public function rules(){
        return[
            ['username', 'required', 'message' => 'Введите имя пользователя'],
            ['email', 'required', 'message' => 'Введите адрес эл.почты'],
            ['password', 'required', 'message' => 'Введите пароль'],
            ['email','email', 'message' => 'Введите корректный адрес эл.почты'],
            ['email', 'unique', 'targetClass'=>'app\models\User', 'message' => 'Пользователь с таким адресом эл.почты уже зарегистрирован'],
            ['username', 'unique', 'targetClass'=>'app\models\User', 'message' => 'Пользователь с таким именем уже зарегистрирован'],
            ['password', 'string', 'min'=>5, 'max'=>20, 'message' => 'Длина пароля должна быть не меньше 5, и не больше 20 символов'],
            ['username', 'string', 'min'=>1, 'max'=>10, 'message' => 'Длина имени пользователя должна не больше 10 символов'],
            ['email', 'string', 'min'=>5, 'max'=>30, 'message' => 'Длина адрес эл.почты должна быть не меньше 5 и не больше 30 символов'],
        ];
    }

    public function signup(){
        $user = new User;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->username = $this->username;
        return $user->save(); // вернет true или false
    }

    public function getUser(){
        return User::findOne(['username'=>$this->username]);//а получаем мы его по введенному usernamy
    }
}