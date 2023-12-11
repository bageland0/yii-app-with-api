<?php
namespace frontend\controllers;

use Yii;
use common\models\News;
use frontend\models\NewsForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class DashboardController extends Controller
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
    //public function actions()
    //{
    //    return [
    //        'error' => [
    //            'class' => 'yii\web\ErrorAction',
    //        ],
    //        'captcha' => [
    //            'class' => 'yii\captcha\CaptchaAction',
    //            'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
    //        ],
    //    ];
    //}

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDashboard()
    {
        return $this->render('dashboard');
    }
}
