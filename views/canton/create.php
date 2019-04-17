<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Canton */

$this->title = 'Crear Cantón';
$this->params['breadcrumbs'][] = ['label' => 'Cantones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canton-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
