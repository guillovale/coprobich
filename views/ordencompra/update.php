<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordencompra */

$this->title = 'Actualizar Orden de Compra No: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordencompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ordencompra-update">

    <div class="col-xs-12">
	<?php
    	#echo Html::a("logo", ["/images/logo_coprobich.jpg"]);
		echo Html::img('@web/images/logo_coprobich.jpg', ['class' => 'pull-left img-responsive', 'height'=>'100px', 'width'=>'100px']);
		
	?>
	<h2> &nbsp <?= Html::encode($this->title) ?></h2>
	</div>
	
    <?= $this->render('_form', [
        'model' => $model,
		'modeldetalles'=>$modeldetalles,
    ]) ?>

</div>
