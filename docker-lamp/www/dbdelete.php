<?php
/* 1. Connect to the database */
require_once "./db.php";
$pdo = dbconnect();

/* 2. Validate and get data */
if( !array_key_exists('id',$_GET) ) {
  header('location: dbstu.php');
  exit();
}
$id = $_GET['id'];

try {
	
  /* 3. Prepare and execute SQL . . . */
  $sql =  'DELETE FROM General_Information ';
  $sql .= ' WHERE id = :id ';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(":id", $id);
  $stmt->execute();			

  /* 4. Check result . . . */
  if( $stmt->rowCount() == 1 ) {
	$queryString = 't='.$id;  // ok
  }
  else {
	$queryString = 'f='.$id;  // fail
  }
  header('location: msgdelete.php?'.$queryString);
  exit();
						
} catch (PDOException $e) {
  die($e->getMessage());
}