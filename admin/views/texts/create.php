<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\Texts $model */

$this->title = Yii::t('app', 'Create Text');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $this->title) ;
?>
<div class="texts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
