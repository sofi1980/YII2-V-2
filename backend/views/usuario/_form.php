<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correoe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput() ?>

    <?= $form->field($model, 'contrasena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_naci')->textInput() ?>

    <?= $form->field($model, 'Rol_id')->textInput() ?>

    <?= $form->field($model, 'formacion_academica_id')->textInput() ?>

    <?= $form->field($model, 'ocupacion_id')->textInput() ?>

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
