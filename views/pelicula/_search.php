<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeliculaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelicula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPelicula') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'duracion') ?>

    <?= $form->field($model, 'idioma') ?>

    <?= $form->field($model, 'estreno') ?>

    <?php // echo $form->field($model, 'Director_idDirector') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
