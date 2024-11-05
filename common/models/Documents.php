<?php

namespace common\models;

/**
 * This is the model class for table "Documents".
 *
 * @property int $id
 * @property string $key
 * @property string $file
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'file'], 'required'],
            [['key', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'file' => 'File',
        ];
    }
}
