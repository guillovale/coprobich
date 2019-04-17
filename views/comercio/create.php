<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comercio */

$this->title = 'Crear Comercio';
$this->params['breadcrumbs'][] = ['label' => 'Comercios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comercio-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
