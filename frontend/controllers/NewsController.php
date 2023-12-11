<?php
namespace frontend\controllers;

use Da\User\Filter\AccessRuleFilter;
use Yii;
use common\models\News;
use frontend\models\NewsForm;
use yii\filters\AccessControl;
use yii\web\Controller;
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'except' => ['index', 'view'],
                'ruleConfig' => [
                    'class' => AccessRuleFilter::class,
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionDashboard()
    {
        $news = News::find();
        return $this->render('dashboard', ["news" => $news]);

    }

    public function actionUpdate($id = null)
    {
        if ($id) {
            $model = News::findOne(['id' => $id]);
        } else {;
            $model = new News();
        }
        if (!$model) {
            return $this->render('../site/error', ['name'=> '404', 'message'=>'Эта запись не найдена']);
        }
        if (Yii::$app->request->post()) {
            $model->attributes = Yii::$app->request->post()["News"];
            $model->save(); 
        }

        return $this->render('update', ['model' => $model]);

    }
    public function actionRead($url)
    {
        $model = News::findOne(['url' => $url]);
        return $this->render('read', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = News::findOne(['id' => $id]);

        if (!$model) {
            return $this->render('../site/error', ['name'=> '404', 'message'=>'Эта запись не найдена']);
        }
        $model->delete(); 

        return $this->response->redirect("/news/dashboard");

    }
}
