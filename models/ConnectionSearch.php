<?php

namespace yii2learning\chartbuilder\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii2learning\chartbuilder\models\Connection;

/**
 * ConnectionSearch represents the model behind the search form about `yii2learning\chartbuilder\models\Connection`.
 */
class ConnectionSearch extends Connection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'connection_name', 'host', 'port', 'username', 'password', 'created_at', 'updated_at'], 'safe'],
            [[ 'created_by', 'updated_by'], 'integer'],
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
        $query = Connection::find();

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
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'connection_name', $this->connection_name])
            ->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'port', $this->port])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
