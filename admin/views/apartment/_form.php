<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii2\Extensions\DynamicForm\DynamicFormWidget;

/** @var yii\web\View $this */
/** @var common\models\Apartment $modelApartment */
/** @var common\models\Room[] $modelsRooms */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apartment-form">

<!--    --><?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($modelApartment, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelApartment, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelApartment, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelApartment, 'price')->textInput() ?>

    <?= $form->field($modelApartment, 'floor')->textInput() ?>

<!--    --><?php //= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelApartment, 'imageFile')->fileInput() ?>

    <?= $form->field($modelApartment, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelApartment, 'add_title')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'add_img')->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelApartment, 'addImageFile')->fileInput() ?>

<!--    --><?php //= $form->field($model, 'API_flag')->textInput() ?>
    <?php
    $const = new \common\models\Flag();?>
    <?=
    $form->field($modelApartment, 'API_flag')->dropDownList($const->getConstants());
    ?>

    <div class="panel panel-default">
<!--        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Комнаты </h4></div>-->
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class.
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' =>  $modelsRooms[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'title',
                    'area',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsRooms as $i => $modelRoom): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <br>
                            <h3 class="panel-title pull-left">Комната</h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (! $modelRoom->isNewRecord) {
                                echo Html::activeHiddenInput($modelRoom, "[{$i}]id");
                            }
                            ?>

                            <div class="row">

                                <div class="col-sm-6">
                                    <?= $form->field($modelRoom, "[{$i}]title")->textInput(['maxlength' => true]) ?>

                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelRoom, "[{$i}]area")->textInput() ?>

                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelRoom, "[{$i}]uid")->textInput() ?>

                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>


    <div class="form-group">
        <br>

        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
