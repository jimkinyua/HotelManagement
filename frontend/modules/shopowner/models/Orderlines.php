<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "orderlines".
 *
 * @property int $lineno
 * @property string $drinkdescription
 * @property int $drinkcostt
 * @property int $drinkid
 * @property int|null $orderid
 * @property int $tableid
 *
 * @property Oders $order
 * @property Drinks $drink
 * @property Coffeetable $table
 */
class Orderlines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderlines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['drinkdescription', 'drinkcostt', 'drinkid', 'tableid'], 'required'],
            [['drinkcostt', 'drinkid', 'orderid', 'tableid'], 'integer'],
            [['drinkdescription'], 'string', 'max' => 45],
            [['orderid'], 'exist', 'skipOnError' => true, 'targetClass' => Oders::className(), 'targetAttribute' => ['orderid' => 'orderid']],
            [['drinkid'], 'exist', 'skipOnError' => true, 'targetClass' => Drinks::className(), 'targetAttribute' => ['drinkid' => 'drinkid']],
            [['tableid'], 'exist', 'skipOnError' => true, 'targetClass' => Coffeetable::className(), 'targetAttribute' => ['tableid' => 'tableid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lineno' => 'Lineno',
            'drinkdescription' => 'Drinkdescription',
            'drinkcostt' => 'Drinkcostt',
            'drinkid' => 'Drinkid',
            'orderid' => 'Orderid',
            'tableid' => 'Tableid',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Oders::className(), ['orderid' => 'orderid']);
    }

    /**
     * Gets query for [[Drink]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrink()
    {
        return $this->hasOne(Drinks::className(), ['drinkid' => 'drinkid']);
    }

    /**
     * Gets query for [[Table]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(Coffeetable::className(), ['tableid' => 'tableid']);
    }
}
