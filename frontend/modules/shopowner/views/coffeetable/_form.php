<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\shopowner\models\Room;
use yii\helpers\ArrayHelper
/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Coffeetable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coffeetable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tablename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tablecode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalseats')->textInput() ?>

    <?=  $form->field($model, 'roomid')
        ->dropDownList(
            ArrayHelper::map(Room::find()->asArray()->all(), 'roomid', 'roomname'),
            ['prompt'=>'Select a Shop'] 
        );

    ?>

    <!-- <?= $form->field($model, 'roomid')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
