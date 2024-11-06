<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \common\models\GalleryImages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="gallery-images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php  $id_gallery = new \common\models\Gallery();
    ?>
    <?= $form->field($model, 'id_gallery')->dropDownList($id_gallery->getGalleryNameArray()) ?>

<!--    --><?php //= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
