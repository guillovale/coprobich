<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comunidad */

$this->title = 'Crear Comunidad';
$this->params['breadcrumbs'][] = ['label' => 'Comunidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comunidad-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
