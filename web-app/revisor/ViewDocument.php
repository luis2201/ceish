<?php

	//$mi_pdf = '../../public/file/evidencias/'.$_GET['id'];
	$mi_pdf = '/var/www/ceish_docs/'.$_GET['id'];
	header('Content-type: application/pdf');
	header('Content-Disposition: inline; filename="'.$mi_pdf.'"');
	readfile($mi_pdf);
/*
	$fileName = basename($_GET['id']);
	$filePath = '/var/www/ceish_docs/'.$fileName;
	if(!empty($fileName) && file_exists($filePath)){
	    // Define headers
	    header("Cache-Control: public");
	    header("Content-Description: File Transfer");
	    header("Content-Disposition: attachment; filename=$fileName");
	    header("Content-Type: application/zip");
	    header("Content-Transfer-Encoding: binary");
	    
	    // Read the file
	    readfile($filePath);
	    exit;
	}else{
	    echo 'The file does not exist.';
	}*/
	
	
?>