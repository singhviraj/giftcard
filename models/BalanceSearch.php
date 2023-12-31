<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Balance;

/**
 * BalanceSearch represents the model behind the search form of `app\models\Balance`.
 */
class BalanceSearch extends Balance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_number', 'balance'], 'integer'],
            [['card_number'], 'safe'],
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
        $query = Balance::find();

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
            'customer_number' => $this->customer_number,
            'balance' => $this->balance,
        ]);

        $query->andFilterWhere(['like', 'card_number', $this->card_number]);

        return $dataProvider;
    }
}
