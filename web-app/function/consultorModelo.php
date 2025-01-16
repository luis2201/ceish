<?php

  require_once 'mainModel.php';

  class ConsultorModelo extends MainModel {

    protected function select_consultor_todos_modelo($procedure) {
        $resp = MainModel::consulta_todos($procedure);

        return $resp;
    }

}

?>