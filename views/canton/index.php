<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CantonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cantones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canton-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear Cantón', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
				'attribute'=>'provincia.detalle',
				'label'=>'Provincia',
				'format'=>'text',//raw, html
			],
			[
				'attribute'=>'detalle',
				'label'=>'Cantón',
				'format'=>'text',//raw, html
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
