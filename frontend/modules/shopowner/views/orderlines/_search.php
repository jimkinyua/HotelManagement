<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\OrderlinesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderlines-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'lineno') ?>

    <?= $form->field($model, 'drinkdescription') ?>

    <?= $form->field($model, 'drinkcostt') ?>

    <?= $form->field($model, 'drinkid') ?>

    <?= $form->field($model, 'orderid') ?>

    <?php // echo $form->field($model, 'tableid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
