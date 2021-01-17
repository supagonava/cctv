<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Address;

/**
 * AddressSearch represents the model behind the search form of `common\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'store_id'], 'integer'],
            [['home_no', 'village', 'road', 'zoi', 'district', 'amphures', 'province', 'post_code'], 'safe'],
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
        $query = Address::find();

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
            'store_id' => $this->store_id,
        ]);

        $query->andFilterWhere(['like', 'home_no', $this->home_no])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'road', $this->road])
            ->andFilterWhere(['like', 'zoi', $this->zoi])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'amphures', $this->amphures])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'post_code', $this->post_code]);

        return $dataProvider;
    }
}
