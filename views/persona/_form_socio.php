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

	
		<?php $form = ActiveForm::begin(); ?>

		

		<?= $form->field($model_socio, 'codigo')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model_socio, 'fecha')->textInput() ?>

		<?= $form->field($model_socio, 'observacion')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model_socio, 'estado')->checkBox() ?>

		<div class="form-group">
		    <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
		</div>

	

    <?php ActiveForm::end(); ?>

</div>
