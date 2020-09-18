<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\shopowner\models\Floors;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'roomname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxtables')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'floorid')
        ->dropDownList(
            ArrayHelper::map(Floors::find()->asArray()->all(), 'floorid', 'floorname'),
            ['prompt'=>'Select a Floor'] 
        );

    ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
