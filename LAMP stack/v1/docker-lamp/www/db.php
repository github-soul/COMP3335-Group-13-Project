<?php  

 $servername = "db";

 $username = "user";

 $password = "test";

 $dbname = "myDb";

 $port = "3306";


 function dbconnect(){
   global $servername, $username, $password, $dbname, $port;
   try{

    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname",$username,$password);

    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Connected succesfully";
    return $conn;
    

 } catch(PDOException $e){
   die('Database Error');

    //echo "Connection failed: " . $e -> getMessage();

 }}