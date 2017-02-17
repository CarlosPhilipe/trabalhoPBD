<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Despesa */

$this->title = 'Editar Despesa: ' . $model->info_adicional;
$this->params['breadcrumbs'][] = ['label' => 'Despesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="despesa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categoria' =>$categoria,
        'situacao' =>$situacao,
    ]) ?>

</div>
