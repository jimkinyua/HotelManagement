<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Drinks */

$this->title = 'Update Drinks: ' . $model->drinkid;
$this->params['breadcrumbs'][] = ['label' => 'Drinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->drinkid, 'url' => ['view', 'id' => $model->drinkid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drinks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
