<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Socios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socio-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?php #Html::a('Crear Socio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            #'id_persona',
            'codigo',
			'persona.cedula',
			'persona.apellido',
			'persona.nombre',
            'fecha',
            'observacion',
			'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
