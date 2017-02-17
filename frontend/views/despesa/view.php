<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Despesa */

$this->title = 'Despesa com '.$model->categoria->nome;
$this->params['breadcrumbs'][] = ['label' => 'Despesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="despesa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Listar', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'data_vencimento',
            'valor',
            'data_cadastro',
            'info_adicional',
            ['attribute'=>'situação', 'value' =>$model->situacao->nome],
            ['attribute'=>'categoria', 'value' =>$model->categoria->nome],
            'descricao:ntext',
        ],
    ]) ?>

</div>
