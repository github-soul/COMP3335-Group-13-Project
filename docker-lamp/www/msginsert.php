<?php
if( array_key_exists('t',$_GET) ) {
  $reply = "Student ".$_GET['t']." is added";  // ok	
} 
else if( array_key_exists('f',$_GET) ) {
  $reply = "Student ".$_GET['f']." cannot be added";  // fail
} 
else {
  header('location: dbstu.php');  // abnormal
  exit();
}
?>
<html>
<head></head>
<body>
<h1>Insert Student</h1>
<p><?=$reply?></p>
<p><a href="dbstu.php">Select All Students</a></p>
</body>
</html>
