<?php
namespace frontend\controllers;

use Da\User\Filter\AccessRuleFilter;
use Yii;
use common\models\News;
use common\models\User;
use frontend\models\NewsForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
/**
 * Site controller
 */
class UsersController extends Controller
{
    public function behaviors()
    {
        return [
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
    public function actionIndex()
    {
        $data = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $data
        ]);
        return $this->render('index', ['data' => $data, 'dataProvider' => $dataProvider]);

    }

    public function actionUpdate($id)
    {
        $model = User::findOne(['id' => $id]);
        if (!$model) {
            return $this->render('../site/error', ['name'=> '404', 'message'=>'Эта запись не найдена']);
        }
        if (Yii::$app->request->post()) {
            $model->attributes = Yii::$app->request->post()["User"];
            $model->save(); 
        }

        return $this->render('update', ['model' => $model]);

    }

    public function actionDelete($id)
    {
        $model = User::findOne(['id' => $id]);

        if (!$model) {
            return $this->render('../site/error', ['name'=> '404', 'message'=>'Эта запись не найдена']);
        }

        if (Yii::$app->request->post()) {
            $model->delete(); 
        }

        return $this->response->redirect("/users/index");
    }
}
