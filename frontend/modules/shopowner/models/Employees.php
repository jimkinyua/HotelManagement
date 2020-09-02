<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $employeeid
 * @property string $firstname
 * @property string $middlename
 * @property string|null $lastname
 * @property string $usergroup
 * @property string $username
 * @property int $shopid
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $verification_token
 * @property string $email
 * @property string $auth_key
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $roleid
 *
 * @property Shops $shop
 * @property Oders[] $oders
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'middlename', 'usergroup', 'username', 'shopid', 'password_hash', 'email', 'auth_key', 'status', 'created_at', 'updated_at', 'roleid'], 'required'],
            [['shopid', 'status', 'created_at', 'updated_at', 'roleid'], 'integer'],
            [['firstname', 'middlename', 'lastname', 'usergroup', 'username', 'verification_token'], 'string', 'max' => 45],
            [['password_hash', 'password_reset_token', 'email', 'auth_key'], 'string', 'max' => 200],
            [['username'], 'unique'],
            [['shopid'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shopid' => 'shopid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employeeid' => 'Employeeid',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'lastname' => 'Lastname',
            'usergroup' => 'Usergroup',
            'username' => 'Username',
            'shopid' => 'Shopid',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'verification_token' => 'Verification Token',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'roleid' => 'Roleid',
        ];
    }

    /**
     * Gets query for [[Shop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['shopid' => 'shopid']);
    }

    /**
     * Gets query for [[Oders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOders()
    {
        return $this->hasMany(Oders::className(), ['employeeid' => 'employeeid']);
    }
}
