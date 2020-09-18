<?php
namespace frontend\modules\shopowner\models;

use Yii;
use yii\base\Model;
use frontend\modules\shopowner\models\Employees;

/**
 * Signup form
 */
class EmployeeSignUpForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $firstname;
    public $middlename;
    public $lastname;
    public $status;
    public $usergroup;
    public $shopid;
    public $roleid;
   


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['firstname', 'required'],
            ['lastname', 'required'],
            ['shopid', 'required'],
            [['roleid', 'middlename'], 'required'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'frontend\modules\shopowner\models\Employees', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255], 
            ['email', 'unique', 'targetClass' => 'frontend\modules\shopowner\models\Employees', 'message' => 'This email address has already been taken.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
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
        exit('qwq');
        $user = new Employees();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->firstname =  $this->firstname;
        $user->middlename = $this->middlename;
        $user->lastname = $this->lastname;
        $user->shopid = $this->shopid;
        $user->roleid = $this->roleid;
        $user->setPassword($this->password_hash);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
