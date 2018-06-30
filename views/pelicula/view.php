<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pelicula */

$this->title = $model->idPelicula;
$this->params['breadcrumbs'][] = ['label' => 'Peliculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelicula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPelicula' => $model->idPelicula, 'Director_idDirector' => $model->Director_idDirector], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPelicula' => $model->idPelicula, 'Director_idDirector' => $model->Director_idDirector], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPelicula',
            'titulo',
            'duracion',
            'idioma',
            'estreno',
            'Director_idDirector',
        ],
    ]) ?>

</div>
