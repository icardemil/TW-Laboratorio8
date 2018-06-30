<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelicula */

$this->title = 'Update Pelicula: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Peliculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPelicula, 'url' => ['view', 'idPelicula' => $model->idPelicula, 'Director_idDirector' => $model->Director_idDirector]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelicula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
