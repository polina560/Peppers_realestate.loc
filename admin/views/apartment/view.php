<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Apartment $model */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apartments') , 'url' => ['index']];
$this->params['breadcrumbs'][] =  Yii::t('app', $this->title);

$this->title = Yii::t('app', $model->title);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apartments') , 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
\yii\web\YiiAsset::register($this);
?>
<div class="apartment-view">

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
            'subtitle',
            'description',
            'price',
            'floor',
            'img',
            'address',
            'add_title',
            'add_img',
            'API_flag',
        ],
    ]) ?>

</div>
