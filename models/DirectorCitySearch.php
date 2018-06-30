<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Director;

/**
 * DirectorCitySearch represents the model behind the search form of `app\models\Director`.
 */
class DirectorCitySearch extends Director
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDirector', 'edad'], 'integer'],
            [['nombre', 'apellido', 'pais', 'productora'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Director::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idDirector' => $this->idDirector,
            'edad' => $this->edad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'productora', $this->productora]);

        return $dataProvider;
    }
}
