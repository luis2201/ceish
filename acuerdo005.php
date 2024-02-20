<?php
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
readfile("reglamentos_CEISH00005_2022.pdf");