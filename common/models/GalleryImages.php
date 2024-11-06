<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

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
    public UploadedFile|string|null $imageFile = null;
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
            [['imageFile'], 'required'],
            [['text'], 'string'],
            [['img', 'title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'id_gallery' => Yii::t('app', 'ID Gallery'),
            'img' => Yii::t('app', 'Image'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'imageFile' => Yii::t('app', 'Image'),


        ];
    }

    public function beforeValidate(): bool
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        return parent::beforeValidate();
    }

    public function beforeSave($insert): bool
    {
        if ($this->imageFile instanceof UploadedFile) {
            if (!$insert && !empty($this->img)) {
                // удалить старую
                $public = Yii::getAlias('@public');
                $oldImagePath = $public . $this->img;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // удаление файла
                }
            }
            $randomName = Yii::$app->security->generateRandomString(8);
            $public = Yii::getAlias('@public');
            $path = '/uploads/' . $randomName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($public . $path);
            $this->img = $path;
        }

        return parent::beforeSave($insert);
    }
}
