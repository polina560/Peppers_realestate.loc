<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var \common\models\GalleryImages $model */

$this->title = Yii::t('app', $model->title);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Galleries'), 'url' => ['/gallery/index']];
$this->params['breadcrumbs'][] = ['label' => $model->gallery->name, 'url' => ['/gallery/view', 'id' => $model->id_gallery]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gallery Images'), 'url' => ['index', 'id_gallery' => $model->gallery->id]];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
\yii\web\YiiAsset::register($this);
?>
<div class="gallery-images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',

            [
                'attribute' => 'id_gallery',
                'value' => function($model){
                    $item = \common\models\Gallery::find()->where(['id' => $model->id_gallery])->one();
                    return $item->name;
                }
            ],

            'img',
            'title',
            'text:ntext',
        ],
    ]) ?>

</div>
