<?php

namespace common\models;

/**
 * This is the model class for table "Texts".
 *
 * @property int $id
 * @property string $key
 * @property int|null $id_group
 * @property string $text
 * @property string|null $admin_comment
 * @property int|null $deletable
 */
class Texts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'text'], 'required'],
            [['id_group', 'deletable'], 'integer'],
            [['text'], 'string'],
            [['key', 'admin_comment'], 'string', 'max' => 255],
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
            'id_group' => 'Id Group',
            'text' => 'Text',
            'admin_comment' => 'Admin Comment',
            'deletable' => 'Deletable',
        ];
    }
}
