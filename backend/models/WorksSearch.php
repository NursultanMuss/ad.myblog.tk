<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Works;

/**
 * WorksSearch represents the model behind the search form about `backend\models\Works`.
 */
class WorksSearch extends Works
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'date'], 'integer'],
            [['address', 'description', 'img', 'type', 'client', 'details', 'technology', 'testimonial'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Works::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 4,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
//            'id' => $this->id,
            'active' => $this->active,
//            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'client', $this->client])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'technology', $this->technology])
            ->andFilterWhere(['like', 'testimonial', $this->testimonial]);

        return $dataProvider;
    }
}
