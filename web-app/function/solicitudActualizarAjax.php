<?php

  require_once "config.php";

  if(isset($_POST['idsolicitud'])){
      require_once "solicitudNegocio.php";
      $solicitud = new solicitudNegocio();
      echo $solicitud->update_solicitud_negocio();      
  } else{
      session_start();
      session_destroy();
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>