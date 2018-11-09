<?php

namespace dmitxe\yii2\wiki\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dmitxe\yii2\wiki\models\WikiArticle;

/**
 * WikiArticleSearch represents the model behind the search form of `dmitxe\yii2\wiki\models\WikiArticle`.
 */
class WikiArticleSearch extends WikiArticle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'created_user_id', 'updated_user_id'], 'integer'],
            [['slug', 'title', 'content', 'created_by', 'updated_by'], 'safe'],
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
        $query = WikiArticle::find();

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
            'category_id' => $this->category_id,
            'created_user_id' => $this->created_user_id,
            'created_by' => $this->created_by,
            'updated_user_id' => $this->updated_user_id,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
