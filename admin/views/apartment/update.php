<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Apartment $modelApartment */
/** @var common\models\Room $modelsRooms */

$this->title =  Yii::t('app', 'Update Apartment: ') . Yii::t('app', $modelApartment->title) ;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apartments') , 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $modelApartment->title) , 'url' => ['view', 'id' => $modelApartment->id]];
$this->params['breadcrumbs'][] =  Yii::t('app', 'Update') ;
?>
<div class="apartment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelApartment' => $modelApartment,
        'modelsRooms' => $modelsRooms
    ]) ?>

</div>
