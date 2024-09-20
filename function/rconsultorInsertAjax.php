<?php
  
   require_once "config.php";

   if(isset($_FILES['foto'])){   	
      require_once "rconsultorNegocio.php";            
      
      $rconsultor = new RconsultorNegocio();

      echo $rconsultor->insert_consultorexterno_negocio();        	
    } else{
      echo '<script>window.location.href="'.DIR.'"</script>';
    }

?>