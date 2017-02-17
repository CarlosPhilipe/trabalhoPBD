<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DespesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Despesas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="despesa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova Despesa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'data_cadastro',
            'data_vencimento',
            'valor',
            'info_adicional',
            //'descricao:ntext',
            //'data_cadastro',
            // 'info_adicional',
            // 'situacao_id',
            // 'user_id',
            // 'categoria_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
