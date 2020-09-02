<?php

namespace frontend\modules\shopowner\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\shopowner\models\Orderlines;

/**
 * OrderlinesSearch represents the model behind the search form of `frontend\modules\shopowner\models\Orderlines`.
 */
class OrderlinesSearch extends Orderlines
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lineno', 'drinkcostt', 'drinkid', 'orderid', 'tableid'], 'integer'],
            [['drinkdescription'], 'safe'],
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
        $query = Orderlines::find();

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
            'lineno' => $this->lineno,
            'drinkcostt' => $this->drinkcostt,
            'drinkid' => $this->drinkid,
            'orderid' => $this->orderid,
            'tableid' => $this->tableid,
        ]);

        $query->andFilterWhere(['like', 'drinkdescription', $this->drinkdescription]);

        return $dataProvider;
    }
}
