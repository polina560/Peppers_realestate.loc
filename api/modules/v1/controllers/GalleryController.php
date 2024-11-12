<?php

namespace api\modules\v1\controllers;

use common\models\Gallery;
use common\models\GalleryImages;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class GalleryController extends AppController
{

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authentificator' => ['except' => ['index']],

        ]);
    }

    public function actionIndex()
    {
        $id = $this->getParameterFromRequest('id');


        $query = Gallery::find();

        if ($id != null) {
            $query->where(['id' => $id]);
            return [
                'success' => true,
                'data' => $query->one(),
            ];
        }
        else $query->orderBy('id');

        $provider = new ActiveDataProvider([
            'query' => $query,
//            'pagination' => [
//                'pageSize' => 3
//            ]
        ]);


        return $this->returnSuccess([
            'galleries' => $provider,

        ]);

    }
}