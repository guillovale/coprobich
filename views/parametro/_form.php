<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parametro */
/* @var $form yii\widgets\ActiveForm */
$criterio =  $this->params['criterio'];

?>

<div class="parametro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_criterio')->dropDownList($criterio,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ponderacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
