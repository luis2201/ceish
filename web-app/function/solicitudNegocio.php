<?php

require_once 'solicitudModelo.php';

class SolicitudNegocio extends SolicitudModelo
{
   public function select_solicitud_pendiente_negocio() 
   {
      $procedure = 'solicitud_select_estado("PENDIENTE DE REVISION")';
      $result = SolicitudModelo::select_solicitud_pendiente_model($procedure);

      return $result->fetchAll();
   }

   public function select_solicitud_no_aprobado_negocio() 
   {
      $procedure = 'solicitud_select_no_aprobado()';
      $result = SolicitudModelo::select_solicitud_pendiente_model($procedure);

      return $result->fetchAll();
   }

   public function select_solicitud_revisado_negocio() 
   {
      $procedure = 'solicitud_select_estado("APROBADO")';
      $result = SolicitudModelo::select_solicitud_aprobado_model($procedure);

      return $result->fetchAll();
   }

   public function select_solicitud_aprobado_condiciones_negocio() 
   {
      $procedure = 'solicitud_select_estado("APROBADO CON CONDICIONES")';
      $result = SolicitudModelo::select_solicitud_aprobado_model($procedure);

      return $result->fetchAll();
   }

   public function select_solicitud_rechazado_negocio() 
   {
      $procedure = 'solicitud_select_estado("RECHAZADO")';
      $result = SolicitudModelo::select_solicitud_aprobado_model($procedure);

      return $result->fetchAll();
   }

   public function select_solicitud_view_negocio() 
   {
      $idsolicitud = MainModel::limpiar_cadena($_GET['solicitud']);
      $idsolicitud = MainModel::decryption($idsolicitud);

      $procedure = 'solicitud_select_view_estado(?)';
      $param = array(
         $idsolicitud
      );
      $result = SolicitudModelo::select_solicitud_view_model($procedure, $param);

      return $result->fetchAll();
   }

   public function update_solicitud_negocio() 
   {
      $idsolicitud   = MainModel::limpiar_cadena($_POST['idsolicitud']);
      $estado        = MainModel::limpiar_cadena($_POST['estado']);
      $observaciones = MainModel::limpiar_cadena($_POST['observaciones']);

      $idsolicitud   = MainModel::decryption($idsolicitud);

      $procedure = 'solicitud_update(?,?,?)';
      $param = array(
         $idsolicitud,
         $estado,
         $observaciones
      );

      $result = SolicitudModelo::update_solicitud_model($procedure, $param);

      if ($result->rowCount() > 0) {
         $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Información del Sistema',
            "icono"     => 'fa fa-information-circle',
            "contenido" => 'Calificación asignada de forma satisfactoria',
            "tipo"      => 'blue',
            "tema"      => 'modern'
         ];
      } else {
         $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Alerta del Sistema',
            "icono"     => 'fas fa-ban',
            "contenido" => 'No fue posible asignar la calificación',
            "tipo"      => 'red',
            "tema"      => 'modern'
         ];
      }
         
      return mainModel::display_alert($alert);
   }

   public function select_cuenta_aprobado_todo_negocio() 
   {
      $procedure = 'chart_aprobado_todo()';
      $result = SolicitudModelo::select_cuenta_aprobado_todo_modelo($procedure);

      return $result->fetchAll();
   }

   public function select_cuenta_aprobado_condiciones_todo_negocio() 
   {
      $procedure = 'chart_aprobado_condiciones_todo()';
      $result = SolicitudModelo::select_cuenta_aprobado_todo_modelo($procedure);

      return $result->fetchAll();
   }

   public function select_cuenta_no_aprobado_todo_negocio() 
   {
      $procedure = 'chart_aprobado_condiciones_todo()';
      $result = SolicitudModelo::select_cuenta_no_aprobado_todo_modelo($procedure);

      return $result->fetchAll();
   }

   public function select_cuenta_exentos_todo_negocio() 
   {
      $procedure = 'chart_exentos_todo()';
      $result = SolicitudModelo::select_cuenta_exentos_todo_modelo($procedure);

      return $result->fetchAll();
   }

   public function select_cuenta_month_year_negocio($month, $year, $estado) 
   {
      $param = array(
         $month,
         $year,
         $estado
      );

      $procedure = 'chart_month_year_estado(?,?,?)';
      $result = SolicitudModelo::select_cuenta_month_year_modelo($procedure, $param);

      return $result->fetchAll();
   }

   public function delete_solicitud_negocio() 
   {
      $numerosolicitud   = MainModel::limpiar_cadena($_POST['numerosolicitud']);      

      $procedure = 'solicitud_delete(?)';
      $param = array(
         $numerosolicitud
      );

      $result = SolicitudModelo::delete_solicitud_model($procedure, $param);

      if ($result->rowCount() > 0) {
         $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Información del Sistema',
            "icono"     => 'fa fa-information-circle',
            "contenido" => 'Se eliminó la solicitud de forma satisfactoria',
            "tipo"      => 'blue',
            "tema"      => 'modern'
         ];
      } else {
         $alert = [
            "clase"     => 'alerta',
            "titulo"    => 'Alerta del Sistema',
            "icono"     => 'fas fa-ban',
            "contenido" => 'No fue posible eliminar la solicitud',
            "tipo"      => 'red',
            "tema"      => 'modern'
         ];
      }
         
      return mainModel::display_alert($alert);
   }
}

?>