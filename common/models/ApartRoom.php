<?php

namespace common\models;

/**
 * This is the model class for table "ApartRoom".
 *
 * @property int $id
 * @property int $id_apartment
 * @property int $id_room
 */
class ApartRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ApartRoom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_apartment', 'id_room'], 'required'],
            [['id_apartment', 'id_room'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_apartment' => 'Id Apartment',
            'id_room' => 'Id Room',
        ];
    }
}
