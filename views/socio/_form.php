<script type="text/javascript">
        $(function() {
           

		$("#inputId").change(function(){
		alert('0k');	
        //do whatever you need to do on actual change of the value of the input field
	});

        });

	

</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Socio */
/* @var $form yii\widgets\ActiveForm */
#<?= $form->field($model, 'id_persona')->textInput()
?>

<div class="socio-form">

	<div class="col-xs-6">
	
		<address>
			<b>C.I.: <?= $model->persona->cedula ?> <br>
			Apellidos: <?= $model->persona->apellido ?> <br>
			Nombres: <?= $model->persona->nombre ?></b> <br>
		</address>
	</div>
	<div class="col-xs-6">
		<?php $form = ActiveForm::begin(); ?>

		

		<?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'fecha')->textInput() ?>

		<?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'estado')->checkBox() ?>

		<div class="form-group">
		    <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
		</div>

	</div>

    <?php ActiveForm::end(); ?>

</div>
