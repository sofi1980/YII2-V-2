<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form of `common\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'celular', 'Rol_id', 'formacion_academica_id', 'ocupacion_id'], 'integer'],
            [['tipodocumento','documento','nombres', 'apellidos', 'correoe', 'direccion', 'contrasena', 'fecha_naci', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'safe'],
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
        $query = Usuario::find();

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
            'celular' => $this->celular,
            'fecha_naci' => $this->fecha_naci,
            'Rol_id' => $this->Rol_id,
            'formacion_academica_id' => $this->formacion_academica_id,
            'ocupacion_id' => $this->ocupacion_id,
            'fechacrea' => $this->fechacrea,
            'fechamodifica' => $this->fechamodifica,
        ]);

        $query->andFilterWhere(['like', 'tipodocumento', $this->tipodocumento])
                ->andFilterWhere(['like', 'documento', $this->documento])
                ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'correoe', $this->correoe])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'contrasena', $this->contrasena])
            ->andFilterWhere(['like', 'usuariocrea', $this->usuariocrea])
            ->andFilterWhere(['like', 'usuariomodifica', $this->usuariomodifica])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
