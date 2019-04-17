<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Criterio */

$this->title = 'Actualizar Criterio';
$this->params['breadcrumbs'][] = ['label' => 'Criterios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="criterio-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
