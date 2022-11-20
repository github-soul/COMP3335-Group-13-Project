<?php
if( array_key_exists('t',$_GET) ) {
  // ok	
  $reply = "Student ".$_GET['t']." is updated";
} 
else if( array_key_exists('f',$_GET) ) {
  // fail
  $reply = "Student ".$_GET['f']." cannot be updated";
} 
else {
  // abnormal
  header('location: dbstu.php');
  exit();
}
?>
<html>
<head></head>
<body>
<h1>Update Student</h1>
<p><?=$reply?></p>
<p><a href="dbstu.php">Select All Students</a></p>
</body>
</html>
