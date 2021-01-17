<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Store;

/**
 * StoreSearch represents the model behind the search form of `common\models\Store`.
 */
class StoreSearch extends Store
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'facebook', 'www', 'line_id', 'longtitude', 'Latitude', 'map_url'], 'safe'],
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
        $query = Store::find();

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
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'www', $this->www])
            ->andFilterWhere(['like', 'line_id', $this->line_id])
            ->andFilterWhere(['like', 'longtitude', $this->longtitude])
            ->andFilterWhere(['like', 'Latitude', $this->Latitude])
            ->andFilterWhere(['like', 'map_url', $this->map_url]);

        return $dataProvider;
    }
}
