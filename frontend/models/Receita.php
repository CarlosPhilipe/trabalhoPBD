<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "receita".
 *
 * @property integer $id
 * @property string $data_cadastro
 * @property string $valor
 * @property string $info_adicional
 * @property string $descricao
 * @property integer $situacao_id
 * @property integer $user_id
 * @property integer $categoria_id
 *
 * @property Categoria $categoria
 * @property Situacao $situacao
 * @property User $user
 */
class Receita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor', 'situacao_id', 'user_id', 'categoria_id'], 'required'],
            [['descricao'], 'string'],
            [['situacao_id', 'user_id', 'categoria_id'], 'integer'],
            [['data_cadastro', 'valor', 'info_adicional'], 'string', 'max' => 45],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            [['situacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Situacao::className(), 'targetAttribute' => ['situacao_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_cadastro' => 'Data Cadastro',
            'valor' => 'Valor',
            'info_adicional' => 'Info Adicional',
            'descricao' => 'Descrição',
            'situacao_id' => 'Situação',
            'user_id' => 'Usuário',
            'categoria_id' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacao()
    {
        return $this->hasOne(Situacao::className(), ['id' => 'situacao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
