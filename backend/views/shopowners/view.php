<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Shopowners */

$this->title = $model->shopownerid;
$this->params['breadcrumbs'][] = ['label' => 'Shopowners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shopowners-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->shopownerid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->shopownerid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'shopownerid',
            'firstname',
            'middlename',
            'lastname',
            'username',
            'password_hash',
            'password_reset_token',
            'verification_token',
            'email:email',
            'auth_key',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
