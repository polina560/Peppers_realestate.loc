<?php

use common\models\GalleryImages;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \common\models\GalleryImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Gallery Images');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Galleries'), 'url' => ['/gallery/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->gallery->name, 'url' => ['/gallery/view', 'id' => $searchModel->id_gallery]];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
?>
<div class="gallery-images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Gallery Images'), ['create', 'id_gallery'=>$searchModel->gallery->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'img',
            'title',
            'text:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GalleryImages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
