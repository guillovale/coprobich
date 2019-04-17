<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comercio;

/**
 * ComercioSearch represents the model behind the search form of `app\models\Comercio`.
 */
class ComercioSearch extends Comercio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_socio', 'id_producto', 'extension', 'estimado'], 'integer'],
            [['observacion', 'codigo_socio'], 'safe'],
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
        $query = Comercio::find();
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
            'comercio.id' => $this->id,
            'id_socio' => $this->id_socio,
            'id_producto' => $this->id_producto,
            'extension' => $this->extension,
            'estimado' => $this->estimado,
        ]);

        $query->andFilterWhere(['like', 'comercio.observacion', $this->observacion]);
	$query->andFilterWhere(['like', 'tbl_socio.codigo', $this->codigo_socio]);

        return $dataProvider;
    }
}
