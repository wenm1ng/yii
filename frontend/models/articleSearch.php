<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Article;

/**
 * articleSearch represents the model behind the search form of `frontend\models\Article`.
 */
class articleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'read_num', 'create_userid', 'status'], 'integer'],
            [['title', 'key', 'create_username', 'create_time', 'content', 'img', 'update_time'], 'safe'],
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
        $query = Article::find();

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
            'article_id' => $this->article_id,
            'read_num' => $this->read_num,
            'create_userid' => $this->create_userid,
            'create_time' => $this->create_time,
            'status' => $this->status,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'create_username', $this->create_username])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
