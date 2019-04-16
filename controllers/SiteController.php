<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\NewsletterForm;
use app\models\SingleForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionApi()
    {
        return $this->render('api');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSingle()
    {
        $model = new SingleForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('single-confirm', ['model' => $model]);
        } else {
            return $this->render('single', ['model' => $model]);
        }
    }

    public function actionNewsletter()
    {
        $model = new NewsletterForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('newsletter-confirm', ['model' => $model]);
        } else {
            return $this->render('newsletter', ['model' => $model]);
        }
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate())
            {
                $user = new User();
                $user->username = $model->username;
                $user->email = $model->email;
                $user->password = \Yii::$app->security->generatePasswordHash($model->username);
                if($user->save()){
                    return $this->goHome();
                }
            }

        return $this->render('signup', compact('model'));
    }

}
