<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Despesa;

/**
 * DespesaSearch represents the model behind the search form about `frontend\models\Despesa`.
 */
class DespesaSearch extends Despesa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'situacao_id', 'user_id', 'categoria_id'], 'integer'],
            [['data_vencimento', 'descricao', 'data_cadastro', 'info_adicional'], 'safe'],
            [['valor'], 'number'],
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
        $query = Despesa::find();

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
            'data_vencimento' => $this->data_vencimento,
            'valor' => $this->valor,
            'data_cadastro' => $this->data_cadastro,
            'situacao_id' => $this->situacao_id,
            'user_id' => $this->user_id,
            'categoria_id' => $this->categoria_id,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'info_adicional', $this->info_adicional]);

        return $dataProvider;
    }
}
