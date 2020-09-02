<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Orderlines */

$this->title = 'Update Orderlines: ' . $model->lineno;
$this->params['breadcrumbs'][] = ['label' => 'Orderlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lineno, 'url' => ['view', 'id' => $model->lineno]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orderlines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
