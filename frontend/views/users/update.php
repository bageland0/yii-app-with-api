<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Update Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'user-update']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->textInput() ?>

                <?= $form->field($model, 'password_hash')->textinput() ?>

                <?= $form->field($model, 'access_token')->textinput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
