<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Text $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="text-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?php
    $const = new \common\models\Key()?>
    <?=
    $form->field($model, 'key')->dropDownList($const->getConstants());
    ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'group')->dropDownList(['contacts' => 'Контакты', null => 'Без группы']); ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
