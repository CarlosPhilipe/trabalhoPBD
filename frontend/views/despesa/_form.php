<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model frontend\models\Despesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="despesa-form">
    <?php $form = ActiveForm::begin(); ?>

    <?=  $form->field($model, 'valor')->widget(MaskMoney::classname(), [
          'pluginOptions' => [
              'prefix' => 'R$ ',
              'thousands' => '.',
              'decimal' => ',',
              'allowNegative' => false
          ]
      ]);?>

    <?= $form->field($model, 'info_adicional')->textInput(['maxlength' => true]) ?>

    <?=  DatePicker::widget([
          'name' => 'data_vencimento',
          'value' => $model->data_cadastro,
          'options' => ['placeholder' => 'Selecione uma data ...'],
          'pluginOptions' => [
              //'format' => 'yyyy-mm-dd',
              'todayHighlight' => true
          ]
      ]);
    ?>

    <?= $form->field($model, 'situacao_id')->dropDownList($situacao, ['prompt'=>'']) ?>

    <?= $form->field($model, 'categoria_id')->dropDownList($categoria, ['prompt'=>'']) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
