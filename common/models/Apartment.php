<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Apartment".
 *
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property string|null $description
 * @property int $price
 * @property int $floor
 * @property string|null $img
 * @property string|null $address
 * @property string|null $add_title
 * @property string|null $add_img
 * @property int|null $API_flag
 */
class Apartment extends \yii\db\ActiveRecord
{
    public UploadedFile|string|null $imageFile = null;
    public UploadedFile|string|null $addImageFile = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Apartment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'floor'], 'required'],
            [['price', 'floor', 'API_flag'], 'integer'],
            [['title', 'subtitle', 'description', 'img', 'address', 'add_title', 'add_img'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['addImageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg'],
        ];
    }

    public function beforeValidate(): bool
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        $this->addImageFile = UploadedFile::getInstance($this, 'addImageFile');
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
        if ($this->addImageFile instanceof UploadedFile) {
            if (!$insert && !empty($this->add_img)) {
                // удалить старую
                $public = Yii::getAlias('@public');
                $oldImagePath = $public . $this->add_img;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // удаление файла
                }
            }
            $randomName = Yii::$app->security->generateRandomString(8);
            $public = Yii::getAlias('@public');
            $path = '/uploads/' . $randomName . '.' . $this->addImageFile->extension;
            $this->addImageFile->saveAs($public . $path);
            $this->add_img = $path;
        }
        return parent::beforeSave($insert);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'floor' => Yii::t('app', 'Floor'),
            'img' => Yii::t('app', 'Image'),
            'address' => Yii::t('app', 'Address'),
            'add_title' => Yii::t('app', 'Add Title'),
            'add_img' => Yii::t('app', 'Add Image'),
            'API_flag' => Yii::t('app', 'Availability by API'),
            'imageFile' => Yii::t('app', 'Image'),
            'addImageFile' => Yii::t('app', 'Additional Image'),

        ];


    }

    public function getRooms()
    {
        return $this->hasMany(Room::class, ['id_apartment' => 'id']);
    }

    public function getApartNameArray()
    {
        $names = self::find()->select(['id', 'title'])->asArray()->all();


        return array_column($names, 'title', 'id');
    }

}
