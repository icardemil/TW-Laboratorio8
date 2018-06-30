<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelicula".
 *
 * @property int $idPelicula
 * @property string $titulo
 * @property int $duracion
 * @property string $idioma
 * @property int $estreno
 * @property int $Director_idDirector
 *
 * @property Director $directorIdDirector
 */
class Pelicula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelicula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPelicula', 'titulo', 'duracion', 'idioma', 'estreno', 'Director_idDirector'], 'required'],
            [['idPelicula', 'duracion', 'estreno', 'Director_idDirector'], 'integer'],
            [['titulo', 'idioma'], 'string', 'max' => 45],
            [['idPelicula', 'Director_idDirector'], 'unique', 'targetAttribute' => ['idPelicula', 'Director_idDirector']],
            [['Director_idDirector'], 'exist', 'skipOnError' => true, 'targetClass' => Director::className(), 'targetAttribute' => ['Director_idDirector' => 'idDirector']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPelicula' => 'Id Pelicula',
            'titulo' => 'Titulo',
            'duracion' => 'Duracion',
            'idioma' => 'Idioma',
            'estreno' => 'Estreno',
            'Director_idDirector' => 'Director Id Director',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirectorIdDirector()
    {
        return $this->hasOne(Director::className(), ['idDirector' => 'Director_idDirector']);
    }
}
