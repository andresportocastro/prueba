<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empleado_rol;

/**
 * Empleado_rolSearch represents the model behind the search form of `app\models\Empleado_rol`.
 */
class Empleado_rolSearch extends Empleado_rol
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empleado_id', 'rol_id', 'id'], 'integer'],
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
        $query = Empleado_rol::find();

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
            'empleado_id' => $this->empleado_id,
            'rol_id' => $this->rol_id,
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
