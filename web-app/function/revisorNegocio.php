<?php

require_once 'revisorModelo.php';

class RevisorNegocio extends RevisorModelo
{

  public function select_revisor_solicitud_todos_negocio()
  {
    $procedure = 'revisor_solicitud_todos();';
    $result = RevisorModelo::select_revisor_solicitud_todos_modelo($procedure);

    return $result->fetchAll();
  }

  public function insert_revisor_asiganar_negocio()
  {
    $idusuario = MainModel::limpiar_cadena($_POST['idusuario']);
    $idsolicitud = MainModel::limpiar_cadena($_POST['idsolicitud']);

    $idusuario = MainModel::decryption($idusuario);
    $idsolicitud = MainModel::decryption($idsolicitud);

    $procedure = 'solicitud_asignada_select(?);';
    $param = array(
      $idsolicitud
    );
    $result = RevisorModelo::select_revisor_solicitud_asignada_modelo($procedure, $param);

    if ($result->rowCount() == 0) {
      $procedure = 'revisor_asignar_insert(?,?);';
      $param = array(
        $idusuario,
        $idsolicitud
      );

      $result = RevisorModelo::insert_revisor_asignar_modelo($procedure, $param);

      if ($result->rowCount() > 0) {
        $alert = [
          "clase"     => 'alerta',
          "titulo"    => 'Información del Sistema',
          "icono"     => 'fa fa-information-circle',
          "contenido" => 'Se asignó el revisor satisfactoriamente',
          "tipo"      => 'blue',
          "tema"      => 'modern'
        ];
      } else {
        $alert = [
          "clase"     => 'alerta',
          "titulo"    => 'Alerta del Sistema',
          "icono"     => 'fa fa-exclamation-circle',
          "contenido" => 'Ocurrió un error inesperado. No es posible realizar la operación solicitada',
          "tipo"      => 'red',
          "tema"      => 'modern'
        ];
      }
    } else {
      $alert = [
        "clase"     => 'alerta',
        "titulo"    => 'Alerta del Sistema',
        "icono"     => 'fa fa-exclamation-circle',
        "contenido" => 'La solicitud ya fue asignada a un revisor. Ingrese otra',
        "tipo"      => 'red',
        "tema"      => 'modern'
      ];
    }

    return mainModel::display_alert($alert);
  }

  public function select_revisor_view_negocio()
  {
    $idsolicitud = MainModel::limpiar_cadena($_GET['idrevisor']);

    $idsolicitud = MainModel::decryption($idsolicitud);

    $procedure = 'revisor_solicitud_id(?);';
    $param = array(
      $idsolicitud
    );

    $result = RevisorModelo::select_revisor_view_modelo($procedure, $param);

    return $result->fetchAll();
  }

  public function update_revisor_asignar_negocio()
  {
    $idrevisor = MainModel::limpiar_cadena($_POST['idrevisor']);
    $idusuario = MainModel::limpiar_cadena($_POST['idusuario']);

    $idrevisor = MainModel::decryption($idrevisor);
    $idusuario = MainModel::decryption($idusuario);

    $procedure = 'revisor_asignar_update(?,?);';
    $param = array(
      $idrevisor,
      $idusuario
    );

    $result = RevisorModelo::update_revisor_asignar_modelo($procedure, $param);

    if ($result->rowCount() > 0) {
      $alert = [
        "clase"     => 'aviso',
        "titulo"    => 'Información del Sistema',
        "icono"     => 'fa fa-information-circle',
        "contenido" => 'Se asignó el revisor satisfactoriamente',
        "tipo"      => 'blue',
        "tema"      => 'modern'
      ];
    } else {
      $alert = [
        "clase"     => 'alerta',
        "titulo"    => 'Alerta del Sistema',
        "icono"     => 'fa fa-exclamation-circle',
        "contenido" => 'Ocurrió un error inesperado. No es posible realizar la operación solicitada',
        "tipo"      => 'red',
        "tema"      => 'modern'
      ];
    }

    return mainModel::display_alert($alert);
  }

  public function delete_revisor_asignar_negocio()
  {
    $idrevisor = MainModel::limpiar_cadena($_POST['idrevisor']);

    $idrevisor = MainModel::decryption($idrevisor);

    $procedure = 'revisor_delete(?);';
    $param = array(
      $idrevisor
    );

    $result = RevisorModelo::delete_revisor_asignar_modelo($procedure, $param);
    if ($result->rowCount() > 0) {
      $alert = [
        "clase"     => 'recargar',
        "titulo"    => 'Información del Sistema',
        "icono"     => 'fa fa-information-circle',
        "contenido" => 'Se eliminó la asignación del revisor satisfactoriamente',
        "tipo"      => 'blue',
        "tema"      => 'modern'
      ];
    } else {
      $alert = [
        "clase"     => 'alerta',
        "titulo"    => 'Alerta del Sistema',
        "icono"     => 'fa fa-exclamation-circle',
        "contenido" => 'Ocurrió un error inesperado. No es posible realizar la operación solicitada',
        "tipo"      => 'red',
        "tema"      => 'modern'
      ];
    }

    return  mainModel::display_alert($alert);
  }

  public function select_revisor_informe_negocio($solicitud)
  {
    $idsolicitud = MainModel::limpiar_cadena($solicitud);

    $idsolicitud = MainModel::decryption($idsolicitud);

    $procedure = 'revisor_solicitud_informe(?);';
    $param = array(
      $idsolicitud
    );

    $result = RevisorModelo::select_revisor_informe_modelo($procedure, $param);

    return $result->fetchAll();
  }

  public function select_revisor_proyecto_pendiente_negocio()
  {
    $idusuario = MainModel::limpiar_cadena($_SESSION['idusuario_com']);

    $idusuario = MainModel::decryption($idusuario);

    $procedure = 'revisor_proyecto_pendiente(?);';
    $param = array(
      $idusuario
    );

    $result = RevisorModelo::select_revisor_proyecto_pendiente_modelo($procedure, $param);

    return $result->fetchAll();
  }

  public function select_revisor_proyecto_negocio()
  {
    $idusuario = MainModel::limpiar_cadena($_SESSION['idusuario_com']);

    $idusuario = MainModel::decryption($idusuario);

    $procedure = 'revisor_proyectos(?);';
    $param = array(
      $idusuario
    );

    $result = RevisorModelo::select_revisor_proyecto_modelo($procedure, $param);

    return $result->fetchAll();
  }

  public function select_revisor_proyecto_view_negocio()
  {
    $idsolicitud = MainModel::limpiar_cadena($_GET['idsolicitud']);

    $idsolicitud = MainModel::decryption($idsolicitud);

    $procedure = 'revisor_view_proyecto(?);';
    $param = array(
      $idsolicitud
    );

    $result = RevisorModelo::select_revisor_proyecto_view_modelo($procedure, $param);

    return $result->fetchAll();
  }

  public function insert_revisor_informe_negocio() 
   {
      $idsolicitud = MainModel::limpiar_cadena($_POST['idsolicitud']);
      $file = $_FILES['informe']['name'];
      $idsolicitud = MainModel::decryption($idsolicitud);

      $path                = INFORMS;
      $newnamedoc          = strtotime("now");
      $extension           = pathinfo($file, PATHINFO_EXTENSION);
      $informe             = $newnamedoc . '.' . $extension;      

      if (move_uploaded_file($_FILES['informe']['tmp_name'], $path . $informe)) {
         $procedure = 'revisor_informe_insert(?,?)';
         $param = array(
            $idsolicitud,
            $informe
         );

         $result = RevisorModelo::insert_revisor_informe_modelo($procedure, $param);

         if ($result->rowCount() > 0) {
            $alert = [
               "clase"     => 'alerta',
               "titulo"    => 'Información del Sistema',
               "icono"     => 'fa-solid fa-circle-info',
               "contenido" => 'Se cargó el informe del revisor satisfactoriamente: ',
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
      } else {
         $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Alerta del Sistema',
            "icono"     => 'fas fa-ban',
            "contenido" => 'Ocurrió un error inesperado con el archivo seleccionado. No es posible realizar la operación solicitada',
            "tipo"      => 'red',
            "tema"      => 'modern'
         ];
      }

      return mainModel::display_alert($alert);
   }

}
