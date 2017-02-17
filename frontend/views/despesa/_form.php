<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Despesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="despesa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'info_adicional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_vencimento')->textInput() ?>

    <?= $form->field($model, 'situacao_id')->dropDownList($situacao, ['prompt'=>'']) ?>

    <?= $form->field($model, 'categoria_id')->dropDownList($categoria, ['prompt'=>'']) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
