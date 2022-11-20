<?php
$dsn = 'mysql:dbname=myDb;host=172.21.0.1;charset=UTF8';
$dbuser = 'user';
$dbpwd = 'test';

function dbconnect(){
	
  global $dsn, $dbuser, $dbpwd;
	
  try {
    $pdo = new PDO($dsn, $dbuser, $dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
						PDO::ERRMODE_EXCEPTION);
	return $pdo;
  } catch (PDOException $e) {
    die('Database Error');
  }
}

