<?php

  require_once 'mainModel.php';

  class SolicitudModelo extends MainModel {

    protected function select_solicitud_numero_model($procedure, $param){      
      $respt = mainModel::consulta_algunos($procedure, $param);
      
      return $respt;      
    }

    protected function select_solicitud_pendiente_model($procedure) 
    {            
      $respt = MainModel::consulta_todos($procedure);

      return $respt;
    }

    protected function select_solicitud_aprobado_model($procedure) 
    {            
      $respt = MainModel::consulta_todos($procedure);

      return $respt;
    }

    protected function select_solicitud_view_model($procedure, $param){      
      $respt = mainModel::consulta_algunos($procedure, $param);
      
      return $respt;      
    }

    protected function update_solicitud_model($procedure, $param){      
      $respt = mainModel::transaccion($procedure, $param);
      
      return $respt;      
    }

    protected function select_cuenta_aprobado_todo_modelo($procedure) 
    {            
      $respt = MainModel::consulta_todos($procedure);

      return $respt;
    }

    protected function select_cuenta_aprobado_condiciones_todo_modelo($procedure) 
    {            
      $respt = MainModel::consulta_todos($procedure);

      return $respt;
    }

    protected function select_cuenta_no_aprobado_todo_modelo($procedure) 
    {            
      $respt = MainModel::consulta_todos($procedure);

      return $respt;
    }

    protected function select_cuenta_exentos_todo_modelo($procedure) 
    {            
      $respt = MainModel::consulta_todos($procedure);

      return $respt;
    }

    protected function select_cuenta_month_year_modelo($procedure, $param) 
    {            
      $respt = MainModel::consulta_algunos($procedure, $param);

      return $respt;
    }

    protected function delete_solicitud_model($procedure, $param){      
      $respt = mainModel::transaccion($procedure, $param);
      
      return $respt;      
    }

  }

?>