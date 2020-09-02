<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Shopowners */

$this->title = 'Create Shopowners';
$this->params['breadcrumbs'][] = ['label' => 'Shopowners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopowners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
