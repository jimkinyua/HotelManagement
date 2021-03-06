<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\OdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'orderid') ?>

    <?= $form->field($model, 'dateordered') ?>

    <?= $form->field($model, 'totalamount') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'customerid') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'employeeid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
