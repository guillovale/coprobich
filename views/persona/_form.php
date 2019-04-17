<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */

$provincia =  $this->params['provincia'];
$canton =  $this->params['canton'];
$parroquia =  $this->params['parroquia'];
$comunidad =  $this->params['comunidad'];

?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="col-xs-6">

		<?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	</div>

	<div class="col-xs-6">

		<?= $form->field($model, 'id_provincia')->dropDownList($provincia,['prompt'=>'Elija...']) ?>

		<?= $form->field($model, 'id_canton')->dropDownList($canton,['prompt'=>'Elija...']) ?>

		<?= $form->field($model, 'id_parroquia')->dropDownList($parroquia,['prompt'=>'Elija...']) ?>

		<?= $form->field($model, 'id_comunidad')->dropDownList($comunidad,['prompt'=>'Elija...']) ?>

	</div>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
