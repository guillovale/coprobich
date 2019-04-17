<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComercioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comercialización';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comercio-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear Comercio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
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
			],
			
			[
				'attribute'=>'socio.nombrePersona',
				'label'=>'Nombre Socio',
				'format'=>'text',//raw, html
			],
            'id_producto',
			[
				'attribute'=>'producto.detalle',
				'label'=>'Producto',
				'format'=>'text',//raw, html
			],
            'extension',
            'estimado',
            //'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
