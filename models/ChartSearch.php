<?php

namespace yii2learning\chartbuilder\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii2learning\chartbuilder\models\Chart;

/**
 * ChartSearch represents the model behind the search form about `yii2learning\chartbuilder\models\Chart`.
 */
class ChartSearch extends Chart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'detail', 'chart_type', 'datasource_id', 'datasource_type', 'tag_name', 'display_type', 'result_id', 'created_at', 'updated_at', 'hospcode', 'query', 'condition', 'options', 'xaxis', 'xaxis_label', 'series', 'yaxis_label', 'title', 'sub_title', 'latest_data', 'params'], 'safe'],
            [['created_by', 'updated_by', 'stacked', 'is_kpi'], 'integer'],
            [['result', 'target_value'], 'number'],
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
        $query = Chart::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'result' => $this->result,
            'target_value' => $this->target_value,
            'stacked' => $this->stacked,
            'is_kpi' => $this->is_kpi,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'chart_type', $this->chart_type])
            ->andFilterWhere(['like', 'datasource_id', $this->datasource_id])
            ->andFilterWhere(['like', 'datasource_type', $this->datasource_type])
            ->andFilterWhere(['like', 'tag_name', $this->tag_name])
            ->andFilterWhere(['like', 'display_type', $this->display_type])
            ->andFilterWhere(['like', 'result_id', $this->result_id])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'query', $this->query])
            ->andFilterWhere(['like', 'condition', $this->condition])
            ->andFilterWhere(['like', 'options', $this->options])
            ->andFilterWhere(['like', 'xaxis', $this->xaxis])
            ->andFilterWhere(['like', 'xaxis_label', $this->xaxis_label])
            ->andFilterWhere(['like', 'series', $this->series])
            ->andFilterWhere(['like', 'yaxis_label', $this->yaxis_label])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'sub_title', $this->sub_title])
            ->andFilterWhere(['like', 'latest_data', $this->latest_data])
            ->andFilterWhere(['like', 'params', $this->params]);

        return $dataProvider;
    }
}
