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


}
