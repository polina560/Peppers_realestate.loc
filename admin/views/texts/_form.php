<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \common\models\Texts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="texts-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'id_group')->textInput() ?>

    <?php
    $id_group = new \common\models\Group();?>

    <?= $form->field($model, 'id_group')->dropDownList($id_group->getNameArray()); ?>

    <?= $form->field($model, 'text')->widget(Widget::className(),  [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'admin_comment')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'deletable')->textInput() ?>
    <?php
    $const = new \common\models\Flag();?>
    <?=
    $form->field($model, 'deletable')->dropDownList($const->getConstants());
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
