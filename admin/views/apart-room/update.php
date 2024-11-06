<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ApartRoom $model */

$this->title = 'Update Apart Room: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apart Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apart-room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
