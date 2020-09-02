<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "shopowners".
 *
 * @property int $shopownerid
 * @property string $firstname
 * @property string|null $middlename
 * @property string $lastname
 * @property string $username
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $verification_token
 * @property string|null $email
 * @property string $auth_key
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Shops[] $shops
 */
class Shopowners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shopowners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'username', 'password_hash', 'verification_token', 'auth_key', 'status', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'middlename', 'password_hash', 'password_reset_token', 'verification_token', 'email', 'auth_key'], 'string', 'max' => 200],
            [['lastname', 'username'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shopownerid' => 'Shopownerid',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'verification_token' => 'Verification Token',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Shops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['shopownerid' => 'shopownerid']);
    }
}
