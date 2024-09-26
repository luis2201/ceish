<?php

require_once 'mainModel.php';

class MensajeModelo extends mainModel
{

  protected function select_mensaje_todos_modelo($procedure)
  {
    $resp = MainModel::consulta_todos($procedure);

    return $resp;
  }

  protected function select_mensaje_nuevos_modelo($procedure)
  {
    $resp = MainModel::consulta_todos($procedure);

    return $resp;
  }

  protected function select_mensaje_view_modelo($procedure, $param)
  {
    $resp = MainModel::consulta_algunos($procedure, $param);

    return $resp;
  }

}

?>