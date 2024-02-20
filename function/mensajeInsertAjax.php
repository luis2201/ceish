<?php

  require_once "config.php";

  if(isset($_POST['nombres'])){
      require_once "mensajeNegocio.php";
      $mensaje = new MensajeNegocio();
      echo $mensaje->insert_mensaje_negocio();      
  } else{
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>