<?php

namespace frontend\modules\shopowner\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\shopowner\models\Drinks;

/**
 * DrinksSearch represents the model behind the search form of `frontend\modules\shopowner\models\Drinks`.
 */
class DrinksSearch extends Drinks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['drinkid', 'price'], 'integer'],
            [['drinkname'], 'safe'],
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
        $query = Drinks::find();

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
            'drinkid' => $this->drinkid,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'drinkname', $this->drinkname]);

        return $dataProvider;
    }
}
