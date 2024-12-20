<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\Documents $model */

$this->title = Yii::t('app', 'Update Documents: ') . Yii::t('app', $model->key);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->id), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="documents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
