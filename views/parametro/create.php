<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parametro */

$this->title = 'Crear Parámetro';
$this->params['breadcrumbs'][] = ['label' => 'Parámetros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametro-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
