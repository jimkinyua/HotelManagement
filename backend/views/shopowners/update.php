<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Shopowners */

$this->title = 'Update Shopowners: ' . $model->shopownerid;
$this->params['breadcrumbs'][] = ['label' => 'Shopowners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shopownerid, 'url' => ['view', 'id' => $model->shopownerid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shopowners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_updateform', [
        'model' => $model,
    ]) ?>

</div>
