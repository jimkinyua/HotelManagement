<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "coffeetable".
 *
 * @property int $tableid
 * @property string $tablename
 * @property string $tablecode
 * @property int $totalseats
 * @property int $roomid
 *
 * @property Room $room
 * @property Orderlines[] $orderlines
 */
class Coffeetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coffeetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tablename', 'tablecode', 'totalseats', 'roomid'], 'required'],
            [['totalseats', 'roomid'], 'integer'],
            [['tablename', 'tablecode'], 'string', 'max' => 45],
            [['roomid'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['roomid' => 'roomid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tableid' => 'Tableid',
            'tablename' => 'Tablename',
            'tablecode' => 'Tablecode',
            'totalseats' => 'Totalseats',
            'roomid' => 'Roomid',
        ];
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['roomid' => 'roomid']);
    }

    /**
     * Gets query for [[Orderlines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderlines()
    {
        return $this->hasMany(Orderlines::className(), ['tableid' => 'tableid']);
    }
}
