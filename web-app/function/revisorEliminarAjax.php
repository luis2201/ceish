<?php

  require_once "config.php";

  if(isset($_POST['idusuario'])){
      require_once "usuarioNegocio.php";
      $usuario = new usuarioNegocio();
      echo $usuario->delete_usuario_negocio();      
  } else{
      session_start();
      session_destroy();
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>