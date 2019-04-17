<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comercio */

$this->title = 'Datos Comercio';
$this->params['breadcrumbs'][] = ['label' => 'Comercios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comercio-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea eliminar el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            #'id',
            #'id_socio',
			[
				'attribute'=>'socio.codigo',
				'label'=>'Código Socio',
				'format'=>'text',//raw, html
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
            'observacion',
        ],
    ]) ?>

</div>
