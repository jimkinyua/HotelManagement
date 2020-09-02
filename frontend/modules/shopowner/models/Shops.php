<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "shops".
 *
 * @property int $shopid
 * @property int $shopownerid
 * @property string $shopname
 *
 * @property Employees[] $employees
 * @property Floors[] $floors
 * @property Shopowners $shopowner
 */
class Shops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shopownerid', 'shopname'], 'required'],
            [['shopownerid'], 'integer'],
            [['shopname'], 'string', 'max' => 45],
            [['shopownerid'], 'exist', 'skipOnError' => true, 'targetClass' => Shopowners::className(), 'targetAttribute' => ['shopownerid' => 'shopownerid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shopid' => 'Shopid',
            'shopownerid' => 'Shopownerid',
            'shopname' => 'Shopname',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['shopid' => 'shopid']);
    }

    /**
     * Gets query for [[Floors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFloors()
    {
        return $this->hasMany(Floors::className(), ['shopid' => 'shopid']);
    }

    /**
     * Gets query for [[Shopowner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShopowner()
    {
        return $this->hasOne(Shopowners::className(), ['shopownerid' => 'shopownerid']);
    }
}
