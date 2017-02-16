<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Receita;

/**
 * ReceitaSearch represents the model behind the search form about `frontend\models\Receita`.
 */
class ReceitaSearch extends Receita
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'situacao_id', 'user_id', 'categoria_id'], 'integer'],
            [['data_cadastro', 'valor', 'info_adicional', 'descricao'], 'safe'],
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
        $query = Receita::find();

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
            'situacao_id' => $this->situacao_id,
            'user_id' => $this->user_id,
            'categoria_id' => $this->categoria_id,
        ]);

        $query->andFilterWhere(['like', 'data_cadastro', $this->data_cadastro])
            ->andFilterWhere(['like', 'valor', $this->valor])
            ->andFilterWhere(['like', 'info_adicional', $this->info_adicional])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
