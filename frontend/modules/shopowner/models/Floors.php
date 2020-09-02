<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "floors".
 *
 * @property int $floorid
 * @property string $floorname
 * @property string $floorcode
 * @property int $shopid
 *
 * @property Shops $shop
 * @property Room[] $rooms
 */
class Floors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'floors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floorname', 'floorcode', 'shopid'], 'required'],
            [['shopid'], 'integer'],
            [['floorname', 'floorcode'], 'string', 'max' => 45],
            [['shopid'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shopid' => 'shopid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'floorid' => 'Floorid',
            'floorname' => 'Floorname',
            'floorcode' => 'Floorcode',
            'shopid' => 'Shopid',
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
     * Gets query for [[Rooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['floorid' => 'floorid']);
    }
}
