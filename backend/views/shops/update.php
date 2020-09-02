<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Shops */

$this->title = 'Update Shops: ' . $model->shopid;
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shopid, 'url' => ['view', 'id' => $model->shopid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
