<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Room".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $area
 * @property string|null $uid
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['area', 'id_apartment'], 'integer'],
            [['title', 'uid'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'area' => Yii::t('app', 'Area'),
            'uid' => Yii::t('app', 'UID'),
            'id_apartment' => Yii::t('app', 'ID Apartment'),

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function fields(): array
    {
        return [
            'title',
            'area',
            'uid',
        ];
    }


    public function getApartments()
    {
        return $this->hasMany(Apartment::class, ['id' => 'id_apartment']);
    }
}
