<?php

  require_once "config.php";

  if(isset($_POST['numerosolicitud'])){
      require_once "solicitudNegocio.php";
      $solicitud = new solicitudNegocio();
      echo $solicitud->select_solicitud_negocio();      
  } else{
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>