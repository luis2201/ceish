<?php

  require_once 'mainModel.php';

  class MensajeModelo extends MainModel
  {

    protected function insert_mensaje_modelo($procedure, $param)
    {
      $respt = MainModel::transaccion($procedure, $param);

      return $respt;
    }

  }

?>