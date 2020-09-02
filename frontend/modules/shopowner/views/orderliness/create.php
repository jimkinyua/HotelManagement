<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shopowner\models\Orderlines */

$this->title = 'Create Orderlines';
$this->params['breadcrumbs'][] = ['label' => 'Orderlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderlines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
