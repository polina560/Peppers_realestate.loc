<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Room $model */

$this->title = Yii::t('app', $model->title);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apartments') , 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
\yii\web\YiiAsset::register($this);
?>
<div class="room-view">

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
            'title',

             [
             'attribute'=>'id_apartment',
                'value'=>function($model){
                    $item = \common\models\Apartment::find()->where(['id' => $model->id_apartment])->one();
                    return $item->title;
                }
                ],
            'area',
            'uid',
        ],
    ]) ?>

</div>
