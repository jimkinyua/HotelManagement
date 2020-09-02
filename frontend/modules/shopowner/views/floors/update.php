<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Floors */

$this->title = 'Update Floors: ' . $model->floorid;
$this->params['breadcrumbs'][] = ['label' => 'Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->floorid, 'url' => ['view', 'id' => $model->floorid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="floors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
