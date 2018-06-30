<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "director".
 *
 * @property int $idDirector
 * @property string $nombre
 * @property string $apellido
 * @property string $pais
 * @property int $edad
 * @property string $productora
 *
 * @property Pelicula[] $peliculas
 */
class Director extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'director';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDirector', 'nombre', 'apellido', 'edad', 'productora'], 'required'],
            [['idDirector', 'edad'], 'integer'],
            [['nombre', 'apellido', 'pais', 'productora'], 'string', 'max' => 45],
            [['idDirector'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDirector' => 'Id Director',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'pais' => 'Pais',
            'edad' => 'Edad',
            'productora' => 'Productora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::className(), ['Director_idDirector' => 'idDirector']);
    }
}
