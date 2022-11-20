<?php
/* 1. Connect to the database */
require_once './db.php';
$pdo = dbconnect();

/* 2. Validate and get data . . . */
if( !array_key_exists('id',$_GET) ) {
  header('location: dbstu.php');
  exit();
}
$id = $_GET['id'];

try {
  /* 3. Prepare and execute SQL . . . */
  $sql =  'SELECT General_Information.id, General_Information.Info,  General_Information.Date FROM General_Information ';
  $sql .= ' WHERE id = :id ';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(":id", $id);
  $stmt->execute();

  /* 4. Check result . . . */
  if( $stmt->rowCount() == 0 ) {
    // student not found
    header('location: dbstu.php');
    exit();
  }

  $result = $stmt->fetch();
  $id = $result['id'];
  $name = $result['Info'];
  $class = $result['Date'];

} catch (PDOException $e) {
  die($e->getMessage());
}
?>
<!-- 5. Show result . . . -->
<html>
<head></head>
<body>
<h1>Update Information</h1>
<form method="post" action="dbupdate.php">
  <p>ID: <?=$id?><input type="hidden" name="id" value="<?=$id?>"  /></p>
  <p>Name: <input type="text" name="name" value="<?=$name?>" /></p>
  <p>Date: <input type="text" name="class" value="<?=$class?>" /></p>
  <p><input type="submit" /></p>
</form>

<p><a href="dbstu.php">Select All Data</a></p>
</body>
</html>
