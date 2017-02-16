<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $nome
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $role
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $email
 * @property string $data_nasc
 * @property string $url_img_perfil
 * @property integer $categoria
 *
 * @property Despesa[] $despesas
 * @property Receita[] $receitas
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['categoria'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['nome', 'auth_key', 'created_at', 'updated_at', 'email', 'data_nasc', 'url_img_perfil'], 'string', 'max' => 45],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['role', 'status'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nome' => 'Nome',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'email' => 'Email',
            'data_nasc' => 'Data Nasc',
            'url_img_perfil' => 'Url Img Perfil',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDespesas()
    {
        return $this->hasMany(Despesa::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasMany(Receita::className(), ['user_id' => 'id']);
    }
}
