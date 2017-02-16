<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Situacao */

$this->title = 'Create Situacao';
$this->params['breadcrumbs'][] = ['label' => 'Situacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="situacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
