<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Receita */

$this->title = 'Nova Receita';
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-create">

    <?= $this->render('_form', [
        'model' => $model,
        'categoria' => $categoria,
        'situacao' => $situacao,
    ]) ?>

</div>
