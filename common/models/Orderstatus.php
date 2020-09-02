<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orderstatus".
 *
 * @property int $orderstatusid
 * @property string $statusname
 * @property string $statuscode
 *
 * @property Oders[] $oders
 * @property OrderModifiedBy[] $orderModifiedBies
 */
class Orderstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['statusname', 'statuscode'], 'required'],
            [['statusname', 'statuscode'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderstatusid' => 'Orderstatusid',
            'statusname' => 'Statusname',
            'statuscode' => 'Statuscode',
        ];
    }

    /**
     * Gets query for [[Oders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOders()
    {
        return $this->hasMany(Oders::className(), ['status' => 'orderstatusid']);
    }

    /**
     * Gets query for [[OrderModifiedBies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderModifiedBies()
    {
        return $this->hasMany(OrderModifiedBy::className(), ['status_changed_to' => 'orderstatusid']);
    }
}
