<?php
    
    $ext = explode(".", $_GET['id']);
	
    if($ext[1]!='pdf'){
		header('Content-type: image/'.$ext[1]);//with header Content type 
		echo file_get_contents('/var/www/ceish_docs/'.$_GET['id']);
  
?>

<img src="/var/www/ceish_docs/<?php echo $_GET['id']; ?>" alt="" style="width: 50%; height: auto;">

<?php

	} else{
		$mi_pdf = '/var/www/ceish_docs/'.$_GET['id'];
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="'.$mi_pdf.'"');
		readfile($mi_pdf);
	}
?>