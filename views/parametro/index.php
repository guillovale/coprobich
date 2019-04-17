<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParametroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parámetros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametro-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear Parámetro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
				'attribute'=>'criterio.detalle',
				'label'=>'Criterio',
				'format'=>'text',//raw, html
			],
            
            'detalle',
            'ponderacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
