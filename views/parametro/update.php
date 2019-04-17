<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parametro */

$this->title = 'Actualizar Parámetro';
$this->params['breadcrumbs'][] = ['label' => 'Parámetros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="parametro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
