<?php

namespace common\models;

/**
 * This is the model class for table "GalleryImages".
 *
 * @property int $id
 * @property int|null $id_gallery
 * @property string $img
 * @property string|null $title
 * @property string|null $text
 */
class GalleryImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'GalleryImages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gallery'], 'integer'],
            [['img'], 'required'],
            [['text'], 'string'],
            [['img', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_gallery' => 'Id Gallery',
            'img' => 'Img',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
