<?php
namespace common\resources;

use Yii;

class Uteis {

  public static function arrayAmbosDespesaReceita(){
    return [ 0 => 'Ambos', 1 => 'Despesa', 2 => 'Receita'];
  }

  public static function textArrayAmbosDespesaReceita($key){
    return Uteis::arrayAmbosDespesaReceita()[$key];
  }

  public static function arrayDespesaReceita(){
    return [ 1 => 'Despesa', 2 => 'Receita'];
  }

  public static function textArrayDespesaReceita($key){
    return Uteis::arrayDespesaReceita()[$key];
  }

  public static function formatoMoedaParaFloat($value){
    $value = str_replace('','R$ ', $value);
    $value = str_replace('',',',$value);
    $value = str_replace(',','.',$value);
    return $value;
  }

  public static function formatoDataTelaBanco($value){
    $value = date("yyyy-mm-dd", strtotime($value));
    return $value;
  }


}
