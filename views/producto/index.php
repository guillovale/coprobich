<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
				'attribute'=>'categoria.detalle',
				'label'=>'Categoría',
				'format'=>'text',//raw, html
			],

            'detalle',
			[
				'attribute'=>'inventario.existencia',
				'label'=>'Existencia',
				'format'=>'text',//raw, html
			],
            'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
