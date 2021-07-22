<?php

namespace app\controllers;

use app\models\Feedback;
use Yii;
use yii\web\Controller;
use app\models\Signup;
use app\models\Login;
use app\models\News;
use app\models\Results;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index',
            ['results' => Results::getInfo(),'news' => News::getInfo()]
        );
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionLogin()
    {
        $model = new Signup();
        $login_model = new Login();

        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup()){
                $chislo = rand(1000, 9999);
                $text = "Добрый день, ваш код для подтверждения учетной записи на сайте: " . $chislo;
                Yii::$app->mailer->compose()
                    ->setFrom('cherepos@yandex.ru')
                    ->setTo($model->email)
                    ->setSubject('Код подтверждения')
                    ->setTextBody($text)
                    ->setHtmlBody($text)
                    ->send();
                Yii::$app->user->login($model->getUser());
                return $this->goHome();
            }
        }

        if(yii::$app->request->post('Login')){
            $login_model->attributes = Yii::$app->request->post('Login');

            if($login_model->validate()){
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login', ['model' => $model, 'login_model' => $login_model]);
    }

    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
            return $this->goHome();
        }
    }

    public function actionFeedback()
    {
        return $this->render('feedback', ['feedbacks' => Feedback::getInfo()]);
    }

}
