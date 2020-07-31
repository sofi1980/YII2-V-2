<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Entrevista;

/**
 * EntrevistaSearch represents the model behind the search form of `common\models\Entrevista`.
 */
class EntrevistaSearch extends Entrevista
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Usuario_id'], 'integer'],
            [['fecha', 'descripcion', 'nombre_asesor', 'seleccionado', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'safe'],
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
        $query = Entrevista::find();

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
            'fecha' => $this->fecha,
            'Usuario_id' => $this->Usuario_id,
            'fechacrea' => $this->fechacrea,
            'fechamodifica' => $this->fechamodifica,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'nombre_asesor', $this->nombre_asesor])
            ->andFilterWhere(['like', 'seleccionado', $this->seleccionado])
            ->andFilterWhere(['like', 'usuariocrea', $this->usuariocrea])
            ->andFilterWhere(['like', 'usuariomodifica', $this->usuariomodifica])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
