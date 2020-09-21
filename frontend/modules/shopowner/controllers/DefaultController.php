<?php

namespace frontend\modules\shopowner\controllers;
use backend\models\ShopOwnerSignUpForm;
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
       
        // return $this->redirect('/shopowner/default/login');

        if (!Yii::$app->shopowner->isGuest) {
            return $this->redirect('/shopowner/employees/');

            return $this->goHome();
        }else{
            return $this->redirect('/shopowner/default/login');

        }

        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->shopowner->isGuest) {
            
            // return $this->goHome();
            return $this->redirect('/shopowner/employees/');

            // return $this->goHome();
        }

         $model = new ShopOwnerLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/shopowner/employees/');

            // exit('Done!');
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionSignUp()
    {
        $model = new ShopOwnerSignUpForm();
        //exit('Hapa');
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', "Account Succesfully Created");
            return $this->redirect('/shopowner/default/login');
            //return $this->redirect(['view', 'id' => $model->shopownerid]);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current Shop Owner.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->shopowner->logout();
        return $this->redirect('/shopowner/default/login');

        //return $this->goHome();
    }

}
