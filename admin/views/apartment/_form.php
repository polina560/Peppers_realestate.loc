<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Apartment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apartment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'floor')->textInput() ?>

<!--    --><?php //= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_title')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'add_img')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'addImageFile')->fileInput() ?>

<!--    --><?php //= $form->field($model, 'API_flag')->textInput() ?>
    <?php
    $const = new \common\models\Flag();?>
    <?=
    $form->field($model, 'API_flag')->dropDownList($const->getConstants());
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
