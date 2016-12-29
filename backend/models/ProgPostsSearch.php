<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Programming;

/**
 * ProgPostsSearch represents the model behind the search form about `backend\models\Programming`.
 */
class ProgPostsSearch extends Programming
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_release', 'date', 'hits', 'hide', 'no_form'], 'integer'],
            [['resource', 'res_link', 'title', 'entry_image', 'category', 'full_text', 'meta_desc', 'meta_key'], 'safe'],
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
        $query = Programming::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        $dataProvider->setSort([
           'attributes' =>[
               'date',
               'title' => [
                   'asc' => ['title' => SORT_ASC],
                   'desc' => ['title' => SORT_DESC],
                   'label' => 'sdas',
                   'default' => SORT_ASC
               ]
           ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Дата' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'Статья', $this->title])
            ;
        return $dataProvider;
    }
}
