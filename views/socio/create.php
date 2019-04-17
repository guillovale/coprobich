<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Socio */

$this->title = 'Create Socio';
$this->params['breadcrumbs'][] = ['label' => 'Socios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
