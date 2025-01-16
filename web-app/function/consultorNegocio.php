<?php

require_once 'consultorModelo.php';

class ConsultorNegocio extends ConsultorModelo
{

  public function select_consultor_todos_negocio()
  {
    $procedure = 'consultor_todos();';
    $result = ConsultorModelo::select_consultor_todos_modelo($procedure);

    return $result->fetchAll();
  }

}

?>