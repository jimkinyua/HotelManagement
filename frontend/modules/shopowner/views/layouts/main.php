<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\sidenav\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style type="text/css">
        div.required label.control-label:after {
        content: " *";
        size:10px;
        color: red;
}
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' =>'/shopowner/employees/',// Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'innerContainerOptions' => ['class' => 'container-fluid'],

        ],
    ]);
  
    if (Yii::$app->shopowner->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/shopowner/default/login']];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/shopowner/employees/']],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
        ];

        $menuItems[] = '<li>'
            . Html::beginForm(['/shopowner/default/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->shopowner->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    
    
    NavBar::end();

    
    ?>

    
     
    <div class="container">
       

        <div class='col-lg-2' >
        
                <?php
                 if (!Yii::$app->shopowner->isGuest) {
                    echo SideNav::widget([
                        'type' => SideNav::TYPE_PRIMARY,
                        'heading' => 'Options',
                        'items' => [
                            [
                                'url' => '/shopowner/employees',
                                'label' => 'Employees',
                                'icon' => '/shopowner/employees'
                            ],
                            [
                                'url' => '/shopowner/shops',
                                'label' => 'Shops',
                                'icon' => 'group'
                            ],

                            [
                                'url' => '/shopowner/floors',
                                'label' => 'Floors',
                                'icon' => 'group'
                            ],

                            [
                                'url' => '/shopowner/room',
                                'label' => 'Rooms',
                                'icon' => 'group'
                            ],

                            [
                                'url' => '/shopowner/coffeetable',
                                'label' => 'Tables',
                                'icon' => 'group'
                            ],

                            
                            // [
                            //     'label' => 'Help',
                            //     'icon' => 'question-sign',
                            //     'items' => [
                            //         ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                            //         ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
                            //     ],
                            // ],
                        ],
                    ]);
                 }
                ?>
        </div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) 
        ?>

        <div class='col-lg-10' >

            <?= $content ?>

        </div>

    
    </div>
</div>



<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
