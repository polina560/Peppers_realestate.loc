<?php

use common\models\Room;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Apartment $modelApartment */
/** @var common\models\Room $modelsRooms */

$this->title = Yii::t('app', 'Create Apartment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apartments') , 'url' => ['index']];
$this->params['breadcrumbs'][] =  Yii::t('app', $this->title);
?>
<div class="apartment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelApartment' => $modelApartment,
        'modelsRooms' => $modelsRooms
    ]) ?>

</div>
