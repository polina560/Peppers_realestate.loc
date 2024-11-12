<?php
/**
 * Created by PhpStorm.
 * User: d.korablev
 * Date: 27.02.2019
 * Time: 15:13
 */

namespace api\modules\v1\controllers;

use common\models\Text;
use yii\filters\auth\HttpBearerAuth;


class SiteController extends AppController
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'authentificator' => [
                'class' => HttpBearerAuth::className(),
                'except' => ['index','error']
            ],
        ]);
    }

    public function actions(): array
    {
        return [
            'docs' => [
                'class' => 'yii2mod\swagger\SwaggerUIRenderer',
                'restUrl' => Url::to(['site/json-schema']),
            ],
            'json-schema' => [
                'class' => 'yii2mod\swagger\OpenAPIRenderer',
                // Тhe list of directories that contains the swagger annotations.
                'scanDir' => [
                    Yii::getAlias('@app/controllers'),
                    Yii::getAlias('@app/models'),
                ],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    // >>>   INDEX   >>>
    public function actionIndex(){
        $texts = Text::find()->all();
        return $this->returnErrorBadRequest();
    }
    // <<<   INDEX   <<<

    // >>>   ERROR   >>>
    public function actionError(){
        return $this->returnErrorBadRequest();
//        return "BAD";
    }
    // <<<   ERROR   <<<

}