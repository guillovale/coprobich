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

	<?= $form->field($model, 'id_provincia')->dropDownList($provincia,['prompt'=>'Elija...']) ?>

	<?= $form->field($model, 'id_canton')->dropDownList($canton,['prompt'=>'Elija...']) ?>

	<?= $form->field($model, 'id_parroquia')->dropDownList($parroquia,['prompt'=>'Elija...']) ?>

	<?= $form->field($model, 'id_comunidad')->dropDownList($comunidad,['prompt'=>'Elija...']) ?>

    <?php ActiveForm::end(); ?>

</div>
