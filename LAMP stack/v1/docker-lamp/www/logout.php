<?php
session_start();
  
session_destroy();
session_unset();

// redirect to login form
header('Location: login.php');
exit();