<?php

namespace frontend\modules\shopowner\models;
use \common\models\Orderstatus;

use Yii;

/**
 * This is the model class for table "oders".
 *
 * @property int $orderid
 * @property string $dateordered
 * @property int $totalamount
 * @property int $status
 * @property int $customerid
 * @property int|null $discount
 * @property int $employeeid
 *
 * @property Employee $employee
 * @property Orderstatus $status0
 * @property OrderModifiedBy[] $orderModifiedBies
 * @property Orderline[] $orderlines
 */
class Oders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateordered', 'totalamount', 'status', 'customerid', 'employeeid'], 'required'],
            [['dateordered'], 'safe'],
            [['totalamount', 'status', 'customerid', 'discount', 'employeeid'], 'integer'],
            [['employeeid'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['employeeid' => 'employeeid']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Orderstatus::className(), 'targetAttribute' => ['status' => 'orderstatusid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderid' => 'Orderid',
            'dateordered' => 'Dateordered',
            'totalamount' => 'Totalamount',
            'status' => 'Status',
            'customerid' => 'Customerid',
            'discount' => 'Discount',
            'employeeid' => 'Employeeid',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employees::className(), ['employeeid' => 'employeeid']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Orderstatus::className(), ['orderstatusid' => 'status']);
    }

    /**
     * Gets query for [[OrderModifiedBies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderModifiedBies()
    {
        return $this->hasMany(OrderModifiedBy::className(), ['orderid' => 'orderid']);
    }

    /**
     * Gets query for [[Orderlines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderlines()
    {
        return $this->hasMany(Orderline::className(), ['orderid' => 'orderid']);
    }
}
