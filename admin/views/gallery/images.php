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
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gallery'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);


//$searchModel->id_gallery = $_GET['id_gallery'];

?>
<div class="gallery-images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Gallery Images'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_gallery',
            'img',
            'title',
            'text:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GalleryImages $model, $key, $index, $column) {
                    return Url::toRoute(['gallery-images/view', 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>

