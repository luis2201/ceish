<?php

  require_once "config.php";

  if(isset($_POST['nombres'])){
      require_once "usuarioNegocio.php";
      $usuario = new usuarioNegocio();
      echo $usuario->insert_usuario_negocio();      
  } else{
      session_start();
      session_destroy();
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>