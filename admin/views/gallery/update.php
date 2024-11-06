<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\Gallery $model */

$this->title = Yii::t('app', 'Update Gallery: ') . Yii::t('app', $model->name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Galleries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
