<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Blog;

/**
 * BlogSearch represents the model behind the search form about `backend\models\Blog`.
 */
class BlogSearch extends Blog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date', 'hits', 'hide'], 'integer'],
            [['title', 'category', 'img', 'intro_text', 'full_text', 'meta_desc', 'meta_key'], 'safe'],
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
        $query = Blog::find();

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
            'id' => $this->id,
            'date' => $this->date,
            'hits' => $this->hits,
            'hide' => $this->hide,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'intro_text', $this->intro_text])
            ->andFilterWhere(['like', 'full_text', $this->full_text])
            ->andFilterWhere(['like', 'meta_desc', $this->meta_desc])
            ->andFilterWhere(['like', 'meta_key', $this->meta_key]);

        return $dataProvider;
    }
}
