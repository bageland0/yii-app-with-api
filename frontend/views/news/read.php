<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-dashboard">
    <h1><?= Html::encode($model->name) ?></h1>
    <div class="row news">
            <div class="panel panel-default">
                    <div class="panel-content">
<?= $model->content?>
</div>
                    <div class="panel->footer">
                        <?= $model->url?>
                    </div>
            </div>
    </div>
</div>
