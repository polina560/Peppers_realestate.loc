<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Room $model */

$this->title = Yii::t('app', 'Create Room');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
?>
<div class="room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
