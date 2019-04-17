<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParroquiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parroquias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parroquia-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear Parroquia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
				'attribute'=>'canton.detalle',
				'label'=>'Cantón',
				'format'=>'text',//raw, html
			],
	    	[
				'attribute'=>'detalle',
				'label'=>'Parroquia',
				'format'=>'text',//raw, html
			],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
