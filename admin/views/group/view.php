<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Group $model */

$this->title = Yii::t('app', $model->title);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
\yii\web\YiiAsset::register($this);
?>
<div class="group-view">

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
//            'texts' => [
//
//                'label'=> Yii::t('app', 'Texts'),
//                'format'=>'raw',
//                'value' => function($data){
//                    $url = "../texts";
//                    return Html::a(Yii::t('app', 'Texts'), $url, ['title' => Yii::t('app', 'Texts')]);
//                }
//            ],
        ],
    ]) ?>

</div>
