<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Criterio */

$this->title = 'Crear Criterio';
$this->params['breadcrumbs'][] = ['label' => 'Criterios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterio-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
