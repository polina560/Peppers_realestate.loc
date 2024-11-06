<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var \common\models\Texts $model */

$this->title = Yii::t('app', $model->id);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
\yii\web\YiiAsset::register($this);
?>
<div class="texts-view">

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
            'key',
                [
                    'attribute'=>'id_group',
                    'value'=>function($model){
                        $item = \common\models\Group::find()->where(['id' => $model->id_group])->one();
                        return $item->title;
                    },
                ],
            'text:html',
            'admin_comment',
            [
                'attribute'=>'deletable',
                'value'=>function($model){
                    $item = new \common\models\Flag();
                    return $item->getDeletableName($model->deletable);
                }
            ],
        ],
    ]) ?>

</div>
