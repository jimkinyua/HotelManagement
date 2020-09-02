<?php

namespace frontend\modules\shopowner\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\shopowner\models\Floors;

/**
 * FloorsSearch represents the model behind the search form of `frontend\modules\shopowner\models\Floors`.
 */
class FloorsSearch extends Floors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floorid', 'shopid'], 'integer'],
            [['floorname', 'floorcode'], 'safe'],
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
        $query = Floors::find();

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
            'floorid' => $this->floorid,
            'shopid' => $this->shopid,
        ]);

        $query->andFilterWhere(['like', 'floorname', $this->floorname])
            ->andFilterWhere(['like', 'floorcode', $this->floorcode]);

        return $dataProvider;
    }
}
