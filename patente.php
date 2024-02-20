<?php
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
readfile("Certificado_Derecho_de_Autor_N63670_signed.pdf");