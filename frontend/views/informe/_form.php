<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Informe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="informe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anexos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Evento_id')->textInput() ?>

    <?= $form->field($model, 'fechacrea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuariocrea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechamodifica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuariomodifica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>