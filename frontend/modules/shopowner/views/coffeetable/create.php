<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Coffeetable */

$this->title = 'Create Table';
$this->params['breadcrumbs'][] = ['label' => 'Coffeetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffeetable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
