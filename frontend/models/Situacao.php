<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "situacao".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $tipo
 *
 * @property Despesa[] $despesas
 * @property Receita[] $receitas
 */
class Situacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'tipo'], 'required'],
            [['tipo'], 'integer'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDespesas()
    {
        return $this->hasMany(Despesa::className(), ['situacao_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasMany(Receita::className(), ['situacao_id' => 'id']);
    }
}
