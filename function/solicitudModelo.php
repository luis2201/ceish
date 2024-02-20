<?php

  require_once 'mainModel.php';

  class SolicitudModelo extends MainModel {
    
    // protected function genera_codigo()
    // {
    //   $respt = MainModel::consulta_todos($procedure);

    //   return $respt;
    // }

    protected function insert_solicitud_model($procedure, $param) 
    {            
      $respt = MainModel::transaccion($procedure, $param);

      return $respt;
    }

    protected function select_solicitud_numero_model($procedure, $param){      
      $respt = mainModel::consulta_algunos($procedure, $param);
      
      return $respt;      
    }

  }

?>