<?php
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
readfile("CEISH_ITSUP_MSP_CGDES_2022_0133_O.pdf");