<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Quotation;

/**
 * QuotationSearch represents the model behind the search form of `common\models\Quotation`.
 */
class QuotationSearch extends Quotation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['Room_Size', 'create_at'], 'safe'],
            [['bugget'], 'number'],
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
        $query = Quotation::find();

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
            'bugget' => $this->bugget,
            'user_id' => $this->user_id,
            'create_at' => $this->create_at,
        ]);

        $query
            ->andFilterWhere(['like', 'Room_Size', $this->Room_Size]);

        return $dataProvider;
    }
}
