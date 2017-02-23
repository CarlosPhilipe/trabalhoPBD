<?php

namespace frontend\models;
use common\resources\Uteis;
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
        return 'conta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_vencimento', 'data_cadastro'], 'safe'],
            [['valor', 'situacao_id', 'user_id', 'categoria_id', 'data_vencimento'], 'required', 'message' => 'O campo {attribute} não pode ser branco'],
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
            'descricao' => 'Descrição',
            'data_cadastro' => 'Data Cadastro',
            'info_adicional' => 'Info Adicional',
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

    public function beforeValidate()
    {
      $this->valor  = Uteis::formatoMoedaParaFloat($this->valor);
        $this->data_vencimento = Uteis::formatoDataTelaBanco($this->data_vencimento);
      if (parent::beforeValidate()) {
          return true;
      }
      return false;

    }


    public function beforeSave($insert)
    {
      //  var_dump($this->data_vencimento);


        if (parent::beforeSave($insert)) {
            // ...custom code here...
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        $this->data_vencimento = Uteis::formatoDataBancoTela($this->data_vencimento);
    }
}
