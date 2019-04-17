<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalleordenc;

/**
 * DetalleordencSearch represents the model behind the search form of `app\models\Detalleordenc`.
 */
class DetalleordencSearch extends Detalleordenc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_orden', 'id_parametro', 'puntuacion'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Detalleordenc::find();

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
	
	#echo var_dump($this->id_orden); exit;
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_orden' => $this->id_orden,
            'id_parametro' => $this->id_parametro,
            'puntuacion' => $this->puntuacion,
        ]);

        return $dataProvider;
    }
}
