<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Receita */

$this->title = 'Editar Receita: ' . $model->info_adicional;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receita-update">

    <?= $this->render('_form', [
        'model' => $model,
        'categoria' => $categoria,
        'situacao' => $situacao,
    ]) ?>

</div>
