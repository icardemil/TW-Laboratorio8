<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Director */

$this->title = $model->idDirector;
$this->params['breadcrumbs'][] = ['label' => 'Directors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="director-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idDirector], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idDirector], [
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
            'idDirector',
            'nombre',
            'apellido',
            'pais',
            'edad',
            'productora',
        ],
    ]) ?>
    <?php
        $cant_movies = count($model->peliculas);
        echo 'Películas del director
                <table class="table">
                    <thead>
                        <tr>
                            <th>idPelícula</th>
                            <th>Título</th>
                            <th>Duración</th>
                            <th>Idioma</th>
                            <th>Estreno</th>
                        </tr>
                    </thead>
                    <tbody>
                ';
        foreach($model->peliculas as $value){
            echo '<tr>
                    <td>'.$value->idPelicula.'</td>
                    <td>'.$value->titulo.'</td>
                    <td>'.$value->duracion.'</td>
                    <td>'.$value->idioma.'</td>
                    <td>'.$value->estreno.'</td>
                </tr>';
            //echo '+ ' . $value->titulo . '<br>';
        }
        echo '</tbody></table>'
    ?>
</div>
