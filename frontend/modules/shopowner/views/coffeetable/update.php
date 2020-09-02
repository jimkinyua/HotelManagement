<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Coffeetable */

$this->title = 'Update Coffeetable: ' . $model->tableid;
$this->params['breadcrumbs'][] = ['label' => 'Coffeetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tableid, 'url' => ['view', 'id' => $model->tableid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coffeetable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
