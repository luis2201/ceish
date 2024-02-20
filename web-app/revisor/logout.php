<?php

  session_start(['name' => 'COM']);
  session_destroy();
  session_unset();

  header('Location: ../login.php');
  
?>