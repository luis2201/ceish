<?php

  require_once 'mainModel.php';

  class UsuarioModelo extends MainModel {

    protected function login_usuario_modelo($procedure, $param){      
      $respt = mainModel::consulta_algunos($procedure, $param);
      
      return $respt;      
    }

    protected function select_usuario_todos_modelo($procedure){      
      $respt = mainModel::consulta_todos($procedure);
      
      return $respt;      
    }

    protected function select_comprueba_usuario_modelo($procedure, $param){      
      $respt = mainModel::consulta_algunos($procedure, $param);
      
      return $respt;      
    }

    protected function insert_usuario_modelo($procedure, $param){      
      $respt = mainModel::transaccion($procedure, $param);
      
      return $respt;      
    }

    protected function select_usuario_view_modelo($procedure, $param){      
      $respt = mainModel::consulta_algunos($procedure, $param);
      
      return $respt;      
    }

    protected function select_usuario_idusuario_modelo($procedure, $param){      
      $respt = mainModel::consulta_algunos($procedure, $param);
      
      return $respt;      
    }

    protected function update_usuario_modelo($procedure, $param){      
      $respt = mainModel::transaccion($procedure, $param);
      
      return $respt;      
    }

    protected function update_usuario_estado_modelo($procedure, $param){      
      $respt = mainModel::transaccion($procedure, $param);
      
      return $respt;      
    }

    protected function delete_usuario_modelo($procedure, $param){      
      $respt = mainModel::transaccion($procedure, $param);
      
      return $respt;      
    }

    protected function select_usuario_activo_modelo($procedure){      
      $respt = mainModel::consulta_todos($procedure);
      
      return $respt;      
    }

  }

?>