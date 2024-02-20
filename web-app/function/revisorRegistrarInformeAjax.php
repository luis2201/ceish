<?php

  require_once "config.php";

  if(isset($_POST['idsolicitud'])){
      require_once "revisorNegocio.php";
      $revisor = new RevisorNegocio();
      echo $revisor->insert_revisor_informe_negocio();      
  } else{
      session_start();
      session_destroy();
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>