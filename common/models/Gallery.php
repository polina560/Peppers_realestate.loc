<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Gallery".
 *
 * @property int $id
 * @property string $name
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function fields(): array
    {
        return [
            'id',
            'name',
            'images',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),

        ];
    }



    public function getGalleryNameArray()
    {
        $names = self::find()->select(['id', 'name'])->asArray()->all();


        return array_column($names, 'name', 'id');
    }



    public static function viewMenuItems()
    {
        /** @var self[] $items */
        $items = self::find()->all();
        $results = [];
        foreach($items as $item){
            $results[] = [
                'label' => $item->name,
                'url' => ['/gallery-images/index', 'id_gallery' => $item->id],
            ];

        }
        return $results;
    }

    public function getImages()
    {
        return $this->hasMany(GalleryImages::class, ['id_gallery' => 'id']);
    }



}
