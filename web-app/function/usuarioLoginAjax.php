<?php

  require_once "config.php";

  if(isset($_POST['usuario'])){
      require_once "usuarioNegocio.php";
      $usuario = new usuarioNegocio();
      echo $usuario->login_usuario_negocio();      
  } else{
      session_start();
      session_destroy();
      echo '<script>window.location.href="'.DIR.'"</script>';
  }

?>