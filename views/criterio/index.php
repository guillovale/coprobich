<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CriterioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Criterios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterio-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear Criterio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'detalle',
            'ponderacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
