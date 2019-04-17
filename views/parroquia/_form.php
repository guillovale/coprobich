<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parroquia */
/* @var $form yii\widgets\ActiveForm */
$canton =  $this->params['canton'];

?>

<div class="parroquia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_canton')->dropDownList($canton,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
