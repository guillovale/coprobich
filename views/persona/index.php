<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Información Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Crear Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cedula',
            'apellido',
            'nombre',
			[
				'attribute'=>'direccion',
				'enableSorting'=>false,
				'format'=>'text',//raw, html
			],
            [
				'attribute'=>'telefono',
				'enableSorting'=>false,
				'format'=>'text',//raw, html
			],
            [
				'attribute'=>'celular',
				'enableSorting'=>false,
				'format'=>'text',//raw, html
			],
[
				'attribute'=>'email',
				'enableSorting'=>false,
				'format'=>'text',//raw, html
			],
            
	   		[
				'attribute'=>'provincia.detalle',
				'label'=>'Provincia',
				'format'=>'text',//raw, html
				#'contentOptions' => ['style' => 'color:blue;'],
				#'content'=>function($data) use ($ca, $cb, $cc, $ex, $as, $ct) {
					//echo var_dump($data); exit;
				#	$promedio_1 = ($data['A1']*$ca + $data['B1']*$cb + $data['C1']*$cc)*$ct + $data['Ex1']*$ex;
				#	return round($promedio_1);
			     #       }
			],
			[
				'attribute'=>'canton.detalle',
				'label'=>'Cantón',
				'format'=>'text',//raw, html
			],
	    	[
				'attribute'=>'parroquia.detalle',
				'label'=>'Parroquia',
				'format'=>'text',//raw, html
			],
			[
				'attribute'=>'comunidad.detalle',
				'label'=>'Comunidad',
				'format'=>'text',//raw, html
			],
			[
				'attribute'=>'socio.estado',
				'label'=>'Socio Activo',
				'format'=>'text',//raw, html
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
