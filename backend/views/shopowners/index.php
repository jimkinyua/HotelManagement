<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ShopownersQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopowners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopowners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shopowners', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shopownerid',
            'firstname',
            'middlename',
            'lastname',
            'username',
            //'password_hash',
            //'password_reset_token',
            //'verification_token',
            //'email:email',
            //'auth_key',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
