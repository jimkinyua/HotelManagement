<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Room */

$this->title = 'Update Room: ' . $model->roomid;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->roomid, 'url' => ['view', 'id' => $model->roomid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
