<?php

use common\models\Text;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

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
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'group',
            'key',
            'value:ntext',
            'comment',
            [
                'class' => ActionColumn::class,
                'buttons' => [
                    'delete' => function (Text $text, $url) {
                        if (!$text->deletable) {
                            return null;
                        }
                        return Html::a(\kartik\icons\Icon::show('trash-alt'), $url, ['']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
