<?php
session_start();

if ( !array_key_exists('expiry',$_SESSION)  // have not logged in
       || time() > $_SESSION['expiry'] ) {  // session is expired
  
  session_destroy();
  session_unset();
  
  // redirect to login form
  header('Location: login.php');
  exit();
}