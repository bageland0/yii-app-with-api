<?php
namespace frontend\controllers\api;

use Da\User\Filter\AccessRuleFilter;
use Yii;
use app\behavior\HashPassword;
use yii\base\Security;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class UsersController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        return [
            'bearerAuth' => [
                'class' => HttpBearerAuth::class,
            ],
            'access' => [
                'class' => AccessControl::class,
                'ruleConfig' => [
                    'class' => AccessRuleFilter::class,
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }


    public function init()
    {
        parent::init();
        Yii::$app->response->format = Response::FORMAT_JSON;
    }


    public function beforeAction($action)
    {
        if ($action->id === 'create') {
            $request = Yii::$app->request;
            $password = $request->getBodyParam('password');
            $bodyParams = $request->getBodyParams();

            if (!empty($password)) {
                $security = new Security();
                $hashedPassword = $security->generatePasswordHash($password);
                $bodyParams['password_hash'] = $hashedPassword;

                // Устанавливаем хэшированный пароль в запросе
                $request->setBodyParams($bodyParams);
            } else {
                throw new BadRequestHttpException('Password is required.');
            }
        }

        return parent::beforeAction($action);
    }
}
