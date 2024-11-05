<?php

namespace common\models;

use Yii;

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
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'id_group' => Yii::t('app', 'ID Group'),
            'text' => Yii::t('app', 'Text'),
            'admin_comment' => Yii::t('app', 'Admin Comment'),
            'deletable' => Yii::t('app', 'Deletable'),

        ];
    }
}
