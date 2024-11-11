<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "text".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $group
 * @property int $deletable
 * @property string|null $comment
 */
class Text extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['value'], 'string'],
            [['deletable'], 'integer'],
            [['key', 'group', 'comment'], 'string', 'max' => 255],
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
            'value' => Yii::t('app', 'Value'),
            'group' => Yii::t('app', 'Group'),
            'deletable' => Yii::t('app', 'Deletable'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }


}
