<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Canton */
/* @var $form yii\widgets\ActiveForm */
$provincia =  $this->params['provincia'];
?>

<div class="canton-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_provincia')->dropDownList($provincia,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
