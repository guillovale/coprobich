<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ordencompra */
/* @var $form yii\widgets\ActiveForm */
$socio =  $this->params['socio'];
$producto =  $this->params['producto'];

?>

<div class="ordencompra-form">
	
	
	<div style="font-size:12px" class="col-xs-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_socio')->dropDownList($socio,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'id_producto')->dropDownList($producto,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    </div>

	<div class="col-xs-8">
	<table class="table table-striped">
	<thead>
        <tr><th>No.</th><th>Criterio</th><th>Ponderación</th><th>Parámetro</th><th>Ponderación Final</th><th>Puntuación</th></tr>
	</thead>
	<tbody>
		<?php $suma_ponderacion = 0; ?>
        <?php foreach($modeldetalles as $i=>$detalle): ?>
			
            <tr>
				<td><?= $i+1; ?></td>
				<td><?=$detalle->parametro->criterio["detalle"]; ?></td>
				<td><?=$detalle->parametro->criterio["ponderacion"]; ?></td>
				<td><?=$detalle->parametro["detalle"]; ?></td>
				<td><?=$detalle->parametro["ponderacion"]; ?></td>
		        <td><?= $form->field($detalle, "[$i]puntuacion")->textInput()->label(false);?></td>
            </tr>
				
			<tr>
				<?php $suma_ponderacion = $suma_ponderacion + $detalle->puntuacion; ?>
				<td></td><td></td><td></td><td></td>
				<td><b>Total: </td>
				<td><b><span id="total"><?= $suma_ponderacion ?></span></td>
			</tr>
 
        <?php  endforeach; ?>
	</tbody>
    </table>
    
    <div class="form-group">
		<?php if ($modeldetalles) {
        echo Html::submitButton('Grabar', ['class' => 'btn btn-success']);}
		?>
    </div>



    <?php ActiveForm::end(); ?>

	</div>

</div>
