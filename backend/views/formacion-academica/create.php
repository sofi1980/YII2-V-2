<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\formacion_academica */

$this->title = 'Create Formacion Academica';
$this->params['breadcrumbs'][] = ['label' => 'Formacion Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacion-academica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
