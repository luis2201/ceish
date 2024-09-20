<?php

  require_once 'mainModel.php';

  class RconsultorModelo extends MainModel {

    protected function insert_consultorexterno_model($procedure, $param) 
    {            
      $respt = MainModel::transaccion($procedure, $param);

      return $respt;
    }
    
  }

?>