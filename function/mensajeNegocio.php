<?php

  require_once 'mensajeModelo.php';

  class MensajeNegocio extends MensajeModelo
  {

    public function insert_mensaje_negocio() 
    {
      $titulo = mainModel::limpiar_cadena($_POST['titulo']);
      $nombres = mainModel::limpiar_cadena($_POST['nombres']);
      $correo = mainModel::limpiar_cadena($_POST['correo']);
      $telefono = mainModel::limpiar_cadena($_POST['telefono']);
      $mensaje = mainModel::limpiar_cadena($_POST['mensaje']);
      
      $procedure = 'mensaje_insert(?,?,?,?,?);';
      $param = array(
        $titulo,
        $nombres,
        $correo,
        $telefono,
        $mensaje
      );

      $resp = MensajeModelo::insert_mensaje_modelo($procedure, $param);
      if($resp->rowCount()>0){
        $alert = [
          "clase"     => 'alerta',
          "titulo"    => 'Información del Sistema',
          "icono"     => 'fa-solid fa-circle-info',
          "contenido" => 'Su mensaje fue enviado satisfactoriamente. Pronto nos comunicaremos con Usted.',
          "tipo"      => 'blue',
          "tema"      => 'modern'
       ];
      } else {
       $alert = [
          "clase"     => 'alerta',
          "titulo"    => 'Alerta del Sistema',
          "icono"     => 'fas fa-ban',
          "contenido" => 'Ocurrió un error inesperado. No es posible realizar la operación solicitada',
          "tipo"      => 'red',
          "tema"      => 'modern'
       ];
      }

      return mainModel::display_alert($alert);
    }

  }

?>