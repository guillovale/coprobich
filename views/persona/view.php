<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->id;
$this->title = 'Información Personal';
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="persona-view">

	<div class="col-xs-6">
    
	<h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro de eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cedula',
            'apellido',
            'nombre',
            'direccion',
            'telefono',
            'celular',
            'email:email',
			[
				'attribute'=>'provincia.detalle',
				'label'=>'Provincia',
				'format'=>'text',//raw, html
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

        ],
    ]) ?>

	</div>

	<div class="col-xs-6">
	<h3>Datos Socio</h3>
	<?= $this->render('_form_socio', [
        'model_socio' => $model_socio,
    ]) ?>
	</div>

</div>
