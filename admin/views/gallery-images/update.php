<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\GalleryImages $model */

$this->title = Yii::t('app', 'Update Gallery Images: ') . Yii::t('app', $model->title);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Galleries'), 'url' => ['/gallery/index']];
$this->params['breadcrumbs'][] = ['label' => $model->gallery->name, 'url' => ['/gallery/view', 'id' => $model->id_gallery]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gallery Images'), 'url' => ['index', 'id_gallery' => $model->gallery->id]];

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->title), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="gallery-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
