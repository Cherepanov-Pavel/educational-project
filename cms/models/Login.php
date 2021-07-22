<?php

namespace app\models;

use yii\base\Model;

class Login extends Model{
    public $username;
    public $password;

    public function rules(){
        return[
            ['username', 'required', 'message' => 'Введите имя пользователя'],
            ['password', 'required', 'message' => 'Введите пароль'],
            ['password', 'validatePassword'] //собственная функция валидации пароля
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()){ //если нет ошибок в валидации
            $user = $this->getUser();//получаем пользователя для дальнейшнего сравнения пароля
            if(!$user || $user->validatePassword($this->password)){ //если мы не нашли такого пользователя, или пароли не совпадают
                //то добавляем новую ошибку для аттрубута password
                $this->addError($attribute, 'Пароль или имя пользователя введены неверно');
            }
        }

    }

    public function getUser(){
        return User::findOne(['username'=>$this->username]);//а получаем мы его по введенному usernamy
    }
}