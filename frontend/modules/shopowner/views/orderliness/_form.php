<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Orderlines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderlines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'drinkdescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drinkcostt')->textInput() ?>

    <?= $form->field($model, 'drinkid')->textInput() ?>

    <?= $form->field($model, 'orderid')->textInput() ?>

    <?= $form->field($model, 'tableid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
