<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\Documents $model */

$this->title = Yii::t('app', 'Create Documents');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
?>
<div class="documents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
