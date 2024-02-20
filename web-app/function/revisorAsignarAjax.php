<?php

  require_once "config.php";

  if(isset($_POST['idusuario'])){
      require_once "revisorNegocio.php";
      $revisor = new revisorNegocio();
      echo $revisor->insert_revisor_asiganar_negocio();      
  } else{
      session_start();
      session_destroy();
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>