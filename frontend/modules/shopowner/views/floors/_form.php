<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\shopowner\models\Shops;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Floors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="floors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floorcode')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'shopid')
        ->dropDownList(
            ArrayHelper::map(Shops::find()->asArray()->all(), 'shopid', 'shopname'),
            ['prompt'=>'Select a Shop'] 
        );

    ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
