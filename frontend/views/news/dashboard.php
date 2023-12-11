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
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?= Html::a('Добавить новость', Url::to('/news/update'))?>
    </div>
    <div class="row news">
        <?php foreach ($news->all() as $newsItem):?>

        <div class="col-md-3">
                <div class="panel panel-default">
                        <div class="panel-heading">

                        <a class="" href="/news/read?url=<?=$newsItem->url?>">
                            <?= $newsItem->name?>
                        </a>
                        </div>
                        <div class="panel-content">
                            <div class="">
                            <?=Html::a("Редактировать", "/news/update?id=".$newsItem->id)?>
                            <?=Html::a("Удалить", "/news/delete?id=".$newsItem->id)?>
                            </div>
                        </div>

                        <div class="panel->footer">
                            <?= $newsItem->url?>
                        </div>
                </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
