<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comercio */
/* @var $form yii\widgets\ActiveForm */
$socio =  $this->params['socio'];
$producto =  $this->params['producto'];

?>

<div class="comercio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_socio')->dropDownList($socio,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'id_producto')->dropDownList($producto,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'extension')->textInput() ?>

    <?= $form->field($model, 'estimado')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
