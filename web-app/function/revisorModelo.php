<?php

  require_once 'mainModel.php';

  class RevisorModelo extends MainModel {

    protected function select_revisor_solicitud_todos_modelo($procedure) {
      $resp = MainModel::consulta_todos($procedure);

      return $resp;
    }

    protected function select_revisor_solicitud_asignada_modelo($procedure, $param) {
      $resp = MainModel::consulta_algunos($procedure, $param);

      return $resp;
    }

    protected function insert_revisor_asignar_modelo($procedure, $param) {
      $resp = MainModel::transaccion($procedure, $param);
      
      return $resp;
    }

    protected function select_revisor_view_modelo($procedure, $param) {
      $resp = MainModel::consulta_algunos($procedure, $param);

      return $resp;
    }

    protected function update_revisor_asignar_modelo($procedure, $param) {
      $resp = MainModel::transaccion($procedure, $param);
      
      return $resp;
    }

    protected function delete_revisor_asignar_modelo($procedure, $param) {
      $resp = MainModel::transaccion($procedure, $param);
      
      return $resp;
    }

    protected function select_revisor_informe_modelo($procedure, $param) {
      $resp = MainModel::consulta_algunos($procedure, $param);

      return $resp;
    }

    protected function select_revisor_proyecto_pendiente_modelo($procedure, $param) {
      $resp = MainModel::consulta_algunos($procedure, $param);

      return $resp;
    }

    protected function select_revisor_proyecto_modelo($procedure, $param) {
      $resp = MainModel::consulta_algunos($procedure, $param);

      return $resp;
    }

    protected function select_revisor_proyecto_view_modelo($procedure, $param) {
      $resp = MainModel::consulta_algunos($procedure, $param);

      return $resp;
    }

    protected function insert_revisor_informe_modelo($procedure, $param) {
      $resp = MainModel::transaccion($procedure, $param);
      
      return $resp;
    }

  }

?>