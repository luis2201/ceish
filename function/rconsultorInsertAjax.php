<?php
  
   require_once "config.php";

   if(isset($_FILES['foto'])){   	
      require_once "rconsultorNegocio.php";            
      
      $rconsultor = new rconsultorNegocio();

      echo $rconsultor->insert_solicitud_negocio();        	
    } else{
      echo '<script>window.location.href="'.DIR.'"</script>';
    }

?>