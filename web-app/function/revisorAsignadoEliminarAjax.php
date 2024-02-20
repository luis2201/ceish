<?php

  require_once "config.php";

  if(isset($_POST['idrevisor'])){
      require_once "revisorNegocio.php";
      $revisor = new revisorNegocio();
      echo $revisor->delete_revisor_asignar_negocio();      
  } else{
      session_start();
      session_destroy();
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>