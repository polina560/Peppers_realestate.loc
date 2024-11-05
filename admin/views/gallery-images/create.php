<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\GalleryImages $model */

$this->title = 'Create Gallery Images';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
