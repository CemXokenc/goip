<?php

namespace app\controllers;

use app\models\NewsletterForm;
use app\models\SingleForm;
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionApi()
    {
        return $this->render('api');
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
}
