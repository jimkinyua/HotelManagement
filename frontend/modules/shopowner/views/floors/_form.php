<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Floors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="floors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floorcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shopid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
