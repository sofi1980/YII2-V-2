<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntrevistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entrevistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrevista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Entrevista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha',
            'descripcion',
            'Usuario_id',
            'nombre_asesor',
            //'seleccionado',
            //'fechacrea',
            //'usuariocrea',
            //'fechamodifica',
            //'usuariomodifica',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
