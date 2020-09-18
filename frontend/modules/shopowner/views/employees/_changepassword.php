<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\shopowner\models\Shops;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-form">



    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'firstname')->textInput() ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true])->label('PassWord') ?>


    <?=  $form->field($model, 'shopid')
        ->dropDownList(
            ArrayHelper::map(Shops::find()->asArray()->all(), 'shopid', 'shopname'),
            ['prompt'=>'Select a Shop'] 
        );

    ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php $a= ['1' => 'Cashier', '0' => 'Mananager', '2'=>'Waitress']; 
        echo $form->field($model, 'roleid')->dropDownList($a,['prompt'=>'Select a Role']);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Add Employee', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
