<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Comunidad */
/* @var $form yii\widgets\ActiveForm */
$parroquia =  $this->params['parroquia'];

?>

<div class="comunidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_parroquia')->dropDownList($parroquia,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
