<?php

namespace common\models;

/**
 * This is the model class for table "TextGroup".
 *
 * @property int $id
 * @property int $id_group
 * @property int $id_text
 */
class TextGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TextGroup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group', 'id_text'], 'required'],
            [['id_group', 'id_text'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_group' => 'Id Group',
            'id_text' => 'Id Text',
        ];
    }
}
