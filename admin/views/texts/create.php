<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\Texts $model */

$this->title = 'Create Texts';
$this->params['breadcrumbs'][] = ['label' => 'Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="texts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
