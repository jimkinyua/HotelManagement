<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\ShopOwners;

/**
 * Signup form
 */
class ShopOwnerSignUpForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstname;
    public $middlename;
    public $lastname;
    public $status;
    public $shopownerid;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['firstname', 'required'],
            ['lastname', 'required'],
            ['middlename', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\ShopOwners', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\ShopOwners', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
       $shopowner = new ShopOwners();
       $shopowner->username = $this->username;
       $shopowner->firstname = $this->firstname;
       $shopowner->lastname = $this->lastname;
       $shopowner->middlename = $this->middlename;
       
       $shopowner->email = $this->email;
       $shopowner->setPassword($this->password);
       $shopowner->generateAuthKey();
       $shopowner->generateEmailVerificationToken();
        return $shopowner->save(); //&& $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param shopowner user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($shopowner)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' =>$shopowner]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
