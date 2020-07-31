<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\formacion_academica */

$this->title = 'Update Formacion Academica: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Formacion Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formacion-academica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
