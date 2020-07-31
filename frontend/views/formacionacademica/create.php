<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Formacionacademica */

$this->title = 'Create Formacionacademica';
$this->params['breadcrumbs'][] = ['label' => 'Formacionacademicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacionacademica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
