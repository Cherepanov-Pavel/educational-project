<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
/* @var $model app\models\RegistrationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';
?>
<div class="site-login">
    <div class = "row">
        <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 polosochka">
                <div class = "enter">
                    <p>Войти</p>
                </div>
                <div class = "please">
                    <p>Пожалуйста, введите свои данные для входа:</p>
                </div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class = \"row\"><div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\"></div><div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-6\">{input}</div></div>\n<div class=\"row\"><div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\"></div><div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-6\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($login_model, 'username')->textInput(['placeholder' => 'Имя пользователя', 'class'=>'form-control text-left']) ?>

        <?= $form->field($login_model, 'password')->passwordInput(['placeholder' => 'Пароль', 'class'=>'form-control text-left']) ?>

        <div class="form-group">
            <div class = "row">
                <div class="col-lg-offset-3 col-lg-6 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3 ">
                    <?= Html::submitButton('Войти', ['class' => 'knopka']) ?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
        </div>
        <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class = "enter">
                <p>Зарегистрироваться</p>
            </div>
            <div class = "please">
                <p>Пожалуйста, введите свои данные для регистрации:</p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "<div class = \"row\"><div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\"></div><div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-6\">{input}</div></div>\n<div class=\"row\"><div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\"></div><div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-6\">{error}</div></div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Имя пользователя', 'class'=>'form-control text-left']) ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Адрес эл.почты', 'class'=>'form-control text-left']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль', 'class'=>'form-control text-left']) ?>

            <div class="form-group">
                <div class = "row">
                    <div class="col-lg-offset-3 col-lg-6 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3 ">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'knopka']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
