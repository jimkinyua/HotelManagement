<?php

namespace frontend\modules\shopowner\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\shopowner\models\Oders;

/**
 * OdersSearch represents the model behind the search form of `frontend\modules\shopowner\models\Oders`.
 */
class OdersSearch extends Oders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderid', 'totalamount', 'status', 'customerid', 'discount', 'employeeid'], 'integer'],
            [['dateordered'], 'safe'],
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
        $query = Oders::find();

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
            'orderid' => $this->orderid,
            'dateordered' => $this->dateordered,
            'totalamount' => $this->totalamount,
            'status' => $this->status,
            'customerid' => $this->customerid,
            'discount' => $this->discount,
            'employeeid' => $this->employeeid,
        ]);

        return $dataProvider;
    }
}
