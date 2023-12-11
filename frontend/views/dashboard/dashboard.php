<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <ul>
            <li><?= Html::a('Новости', Url::to('/news/dashboard'))?></li>
            <?php if (\Yii::$app->user->can('administration')): ?>
                <li><?= Html::a('Пользователи', Url::to('/users/index'))?></li>
            <?php endif; ?>
        </ul>

    </div>
</div>
