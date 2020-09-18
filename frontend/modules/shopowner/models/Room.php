<?php

namespace frontend\modules\shopowner\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $roomid
 * @property string $roomname
 * @property string $maxtables
 * @property int $floorid
 *
 * @property Coffeetable[] $coffeetables
 * @property Floors $floor
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roomname', 'maxtables', 'floorid'], 'required'],
            [['floorid'], 'integer'],
            [['roomname', 'maxtables'], 'string', 'max' => 45],
            [['floorid'], 'exist', 'skipOnError' => true, 'targetClass' => Floors::className(), 'targetAttribute' => ['floorid' => 'floorid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'roomid' => 'Roomid',
            'roomname' => 'Name of the Room',
            'maxtables' => 'Max Number of Tables this Room can Accomodate?',
            'floorid' => 'Floor in Which the Room is in',
        ];
    }

    /**
     * Gets query for [[Coffeetables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoffeetables()
    {
        return $this->hasMany(Coffeetable::className(), ['roomid' => 'roomid']);
    }

    /**
     * Gets query for [[Floor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(Floors::className(), ['floorid' => 'floorid']);
    }
}
