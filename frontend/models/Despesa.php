<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "despesa".
 *
 * @property integer $id
 * @property string $data_vencimento
 * @property double $valor
 * @property string $descricao
 * @property string $data_cadastro
 * @property string $info_adicional
 * @property integer $situacao_id
 * @property integer $user_id
 * @property integer $categoria_id
 *
 * @property Categoria $categoria
 * @property Situacao $situacao
 * @property User $user
 */
class Despesa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'despesa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_vencimento', 'data_cadastro'], 'safe'],
            [['valor', 'situacao_id', 'user_id', 'categoria_id'], 'required'],
            [['valor'], 'number'],
            [['descricao'], 'string'],
            [['situacao_id', 'user_id', 'categoria_id'], 'integer'],
            [['info_adicional'], 'string', 'max' => 45],
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
            'data_vencimento' => 'Data Vencimento',
            'valor' => 'Valor',
            'descricao' => 'Descricao',
            'data_cadastro' => 'Data Cadastro',
            'info_adicional' => 'Info Adicional',
            'situacao_id' => 'Situacao ID',
            'user_id' => 'User ID',
            'categoria_id' => 'Categoria ID',
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
