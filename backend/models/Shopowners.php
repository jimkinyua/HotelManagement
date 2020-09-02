<?php

namespace backend\models;

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
 * @property string $password_reset_token
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
            [['firstname', 'lastname', 'username'], 'required'],
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
            // 'password_hash' => 'Password',
            // 'password_reset_token' => 'Password Reset Token',
            // 'verification_token' => 'Verification Token',
            'email' => 'Email',
            // 'auth_key' => 'Auth Key',
            // 'status' => 'Status',
            // 'created_at' => 'Created At',
            // 'updated_at' => 'Updated At',
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
