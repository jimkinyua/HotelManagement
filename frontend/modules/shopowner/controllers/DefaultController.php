<?php

namespace frontend\modules\shopowner\controllers;

use yii\web\Controller;
use Yii;
use common\models\ShopOwnerLoginForm;

/**
 * Default controller for the `shopowner` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->shopowner->isGuest) {
            return $this->goHome();
        }else{
            return $this->redirect('/shopowner/default/login');

        }

        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->shopowner->isGuest) {
            return $this->goHome();
        }

         $model = new ShopOwnerLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            exit('Done!');
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
}
