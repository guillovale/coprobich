<?php

use yii\helpers\Html;
#use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ordencompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordencompra-form">
	
	

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'action' => ['create'],
    'method' => 'get',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-4',
        ],
    ],
]); ?>

	<div class="row">
        <div class="col-md-4">
 			<?php foreach ($modeldetalles as $index => $modeldetalle) 
			{
				$name = "Hola mundo";
				echo $form->field($modeldetalle, "[$index]puntuacion")->label(false);
			} ?>
       </div>
       
    </div>

   

    
    <div class="form-group">
        <? Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

	

</div>
