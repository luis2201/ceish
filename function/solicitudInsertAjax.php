<?php
  
   require_once "config.php";

   if(isset($_FILES['doc1'])){   	
      require_once "solicitudNegocio.php";            
      
      $solicitud = new solicitudNegocio();

      echo $solicitud->insert_solicitud_negocio();        	
    } else{
      echo '<script>window.location.href="'.DIR.'"</script>';
    }

?>