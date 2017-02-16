<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DespesaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="despesa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data_vencimento') ?>

    <?= $form->field($model, 'valor') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'data_cadastro') ?>

    <?php // echo $form->field($model, 'info_adicional') ?>

    <?php // echo $form->field($model, 'situacao_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'categoria_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
