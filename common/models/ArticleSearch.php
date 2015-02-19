<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article;

/**
 * ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
class ArticleSearch extends Article
{
    public function rules()
    {
        return [
            [['id', 'category_id', 'status_article', 'mainpage', 'issue_id'], 'integer'],
            [['created_at', 'updated_at', 'title', 'content', 'brief', 'alias', 'photo_main', 'pdf_src'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,
            'status_article' => $this->status_article,
            'mainpage' => $this->mainpage,
            'issue_id' => $this->issue_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'photo_main', $this->photo_main])
            ->andFilterWhere(['like', 'pdf_src', $this->pdf_src]);

        return $dataProvider;
    }
}
