<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\GalleryImages $model */

$this->title = Yii::t('app', 'Create Gallery Images');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gallery Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
?>
<div class="gallery-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
