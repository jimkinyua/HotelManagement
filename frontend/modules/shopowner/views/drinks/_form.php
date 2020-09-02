<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Drinks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drinks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'drinkname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
