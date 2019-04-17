<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordencompra;

/**
 * OrdencompraSearch represents the model behind the search form of `app\models\Ordencompra`.
 */
class OrdencompraSearch extends Ordencompra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_socio', 'id_producto'], 'integer'],
            [['fecha', 'codigo_socio'], 'safe'],
            [['existencia', 'cantidad'], 'number'],
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
        $query = Ordencompra::find();
		$query->joinWith(['socio']);
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
            'id' => $this->id,
            'id_socio' => $this->id_socio,
            'id_producto' => $this->id_producto,
            'fecha' => $this->fecha,
            'existencia' => $this->existencia,
            'cantidad' => $this->cantidad,

        ]);
	
		$query->andFilterWhere(['like', 'tbl_socio.codigo', $this->codigo_socio]);

        return $dataProvider;
    }
}
