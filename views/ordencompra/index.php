<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdencompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Órdenes de Compra';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordencompra-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear Orden de Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            #'id_socio',
			[
				'attribute'=>'codigo_socio',
				'label'=>'Código Socio',
				'format'=>'text',//raw, html
				'content'=>function($data){
				return $data->socio->codigo;}
			],
			[
				'attribute'=>'socio.persona.cedula',
				'label'=>'Cédula Socio',
				'format'=>'text',//raw, html
				#'content'=>function($data){
				#return $data->socio->codigo;}
			],
			[
			#	'attribute'=>'socio.cliente.cedula',
				'label'=>'Socio',
				'format'=>'text',//raw, html
				'content'=>function($data){
				return $data->socio->getNombrepersona();}
			],
			[
				'attribute'=>'id_producto',
				'label'=>'ID Producto',
				'format'=>'text',
			],
			[
				'attribute'=>'producto.detalle',
				'label'=>'Producto',
				'format'=>'text',//raw, html
				#'content'=>function($data){
				#return $data->socio->codigo;}
			],
            'fecha',
           # 'existencia',
            'cantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
