<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FormacionacademicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formacionacademicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacionacademica-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Formacionacademica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre_formacion',
            'fechacrea',
            'usuariocrea',
            'fechamodifica',
            //'usuariomodifica',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
