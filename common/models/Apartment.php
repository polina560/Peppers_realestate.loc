<?php

namespace common\models;

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
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'description' => 'Description',
            'price' => 'Price',
            'floor' => 'Floor',
            'img' => 'Img',
            'address' => 'Address',
            'add_title' => 'Add Title',
            'add_img' => 'Add Img',
            'API_flag' => 'Api Flag',
        ];
    }
}
