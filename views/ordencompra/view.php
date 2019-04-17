<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Ordencompra */

$this->title = 'Orden de Compra No: '. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordencompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ordencompra-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea eliminar el registtro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

	<div style="font-size:12px" class="col-xs-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            #'id',
            #'id_socio',
            #'id_producto',
			[
				'attribute'=>'socio.codigo',
				'label'=>'Código Socio',
				'format'=>'text',
			],
			[
				'attribute'=>'socio.persona.cedula',
				'label'=>'Cédula Socio',
				'format'=>'text',
			],
			[
				'attribute'=>'socio.persona.apellido',
				'label'=>'Apellido Socio',
				'format'=>'text',
				#'content'=>function($data){
				#return $data->socio->getNombrepersona();}
			],
			[
				'attribute'=>'socio.persona.nombre',
				'label'=>'Nombre Socio',
				'format'=>'text',
				#'content'=>function($data){
				#return $data->socio->getNombrepersona();}
			],
			[
				'attribute'=>'id_producto',
				'label'=>'ID Producto',
				'format'=>'text',
			],
			[
				'attribute'=>'producto.detalle',
				'label'=>'Producto',
				'format'=>'text',
			],
            'fecha',
            #'existencia',
            'cantidad',
        ],
    ]) ?>
	</div>

	<div style="font-size:12px" class="col-xs-6">
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        #'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            #'id_orden',
			#'id_parametro',
			[
				'attribute'=>'parametro.criterio.detalle',
				'label'=>'Criterio',
				'format'=>'text',
			],
			[
				'attribute'=>'parametro.criterio.ponderacion',
				'label'=>'Ponderación',
				'format'=>'text',
			],
			[
				'attribute'=>'parametro.detalle',
				'label'=>'Parámetro',
				'format'=>'text',
			],
			[
				'attribute'=>'parametro.ponderacion',
				'label'=>'Ponderación',
				'format'=>'text',
			],
			'puntuacion',

            #['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

	</div>
</div>
