<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "drinks".
 *
 * @property int $drinkid
 * @property string $drinkname
 * @property int $price
 *
 * @property Orderlines[] $orderlines
 */
class Drinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drinks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['drinkname', 'price'], 'required'],
            [['price'], 'integer'],
            [['drinkname'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'drinkid' => 'Drinkid',
            'drinkname' => 'Drinkname',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Orderlines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderlines()
    {
        return $this->hasMany(Orderlines::className(), ['drinkid' => 'drinkid']);
    }
}
