<?php

require_once 'mensajeModelo.php';

class MensajeNegocio extends MensajeModelo
{

  public function select_mensaje_todos_negocio()
  {
    $procedure = 'mensaje_select_todos();';
    $result = MensajeModelo::select_mensaje_todos_modelo($procedure);
    
    return $result->fetchAll();
  }

  public function select_mensaje_nuevos_negocio()
  {
    $procedure = 'mensaje_select_nuevo();';
    $result = MensajeModelo::select_mensaje_nuevos_modelo($procedure);

    return $result->fetchAll();
  }

  public function select_mensaje_view_negocio()
  {
    $idmensaje = MainModel::limpiar_cadena($_GET['idmensaje']);
    $idmensaje = MainModel::decryption($idmensaje);

    $procedure = 'mensaje_select_id(?);';
    $param = array(
      $idmensaje
    );

    $result = MensajeModelo::select_mensaje_view_modelo($procedure, $param);

    return $result->fetchAll();
  }

}

?>