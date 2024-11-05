<?php

namespace common\models;

use Yii;

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
            'subtitle' => Yii::t('app', 'Subtitle'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'floor' => Yii::t('app', 'Floor'),
            'img' => Yii::t('app', 'Img'),
            'address' => Yii::t('app', 'Address'),
            'add_title' => Yii::t('app', 'Add Title'),
            'add_img' => Yii::t('app', 'Add Image'),
            'API_flag' => Yii::t('app', 'Availability by API'),

        ];
    }
}
