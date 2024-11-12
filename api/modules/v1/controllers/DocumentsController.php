<?php

namespace api\modules\v1\controllers;

use common\models\Documents;
use common\models\Text;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class DocumentsController extends AppController
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


        $query = Documents::find();

        if($id != null) {
            $query->andWhere(['id' => $id]);
            return [
                'success' => true,
                'data' => $query->one(),
            ];
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
//            'pagination' => [
//                'pageSize' => 3
//            ]
        ]);


        return $this->returnSuccess([
            'documents' => $provider,

        ]);


    }
}