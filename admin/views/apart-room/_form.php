<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ApartRoom $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apart-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_apartment')->textInput() ?>

    <?= $form->field($model, 'id_room')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
