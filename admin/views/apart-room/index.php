<?php

use common\models\ApartRoom;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ApartRoomSerch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Apart Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apart-room-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apart Room', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_apartment',
            'id_room',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ApartRoom $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
