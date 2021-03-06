<?php

/* @var $this yii\web\View */

use frontend\models\Situacao;
use frontend\models\Categoria;

$this->title = 'Extrato';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
          <h1>Saldo: <?= $saldo?></h1>
        </div>
        <div class="row">
          <table class="table table-bordered">
            <tr>
              <th>Data cadastro</th>
              <th>Valor</th>
              <th>Data vencimento</th>
              <th>Situação</th>
              <th>Categoria</th>
              <th>info. dicional</th>
            </tr>
            <?php foreach ($movimentacoes as $key => $value):?>
              <tr class="<?= ( $value['tipo'] == 0 ? 'danger' : 'success')?>">
                <td><?= $value['data_cadastro']?></td>
                <td><?= ($value['valor']) ?></td>
                <td><?= $value['data_vencimento']?></td>
                <td><?= Situacao::find($value['situacao_id'])->one()->nome ?></td>
                <td><?= Categoria::find($value['categoria_id'])->one()->nome ?></td>
                <td><?= ($value['info_adicional']) ?></td>
              </tr>

            <?php endforeach;?>
          </table>
        </div>

    </div>
</div>
