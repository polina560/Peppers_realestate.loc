<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ApartRoom $model */

$this->title = 'Create Apart Room';
$this->params['breadcrumbs'][] = ['label' => 'Apart Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apart-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
