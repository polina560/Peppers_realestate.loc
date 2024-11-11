<?php

use common\models\Text;
use kartik\editable\Editable;
use kartik\grid\EditableColumn;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\TextSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Texts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-index">

    <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Create Text'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,

        'columns' => [


            'id',
            'group',

            'key' => [
                'attribute' => 'Key',
                'value' => function (Text $text) {
                    $const = new \common\models\Key();
                    return $const->getDeletableName($text->key);

                }
            ],

            [
                'class' => EditableColumn::class,
                'attribute' => 'value',
                'editableOptions' => [
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => [
                        'action' => Url::to(['change'])
                    ]
                ],
            ],

            [
                'class' => EditableColumn::class,
                'attribute' => 'comment',
                'editableOptions' => [
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => [
                        'action' => Url::to(['change'])
                    ]
                ],
            ],


            [
                'class' => ActionColumn::class,
                'buttons' => [
                    'deletable' => function (Text $text, $url) {
                        if (!$text->deletable) {
                            return null;
                        }
                        return Html::a(\kartik\icons\Icon::show('trash-alt'), $url, ['']);
                    }
                ]
            ],
        ],
    ]);

    ?>

    <?php ?>





</div>
