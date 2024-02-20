<?php
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
readfile("./assets/anexos/Anexo6_1.pdf");