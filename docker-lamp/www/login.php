<?php 
require_once './db.php';
session_start();
unset($_SESSION["expiry"]);  // clear session data
$reply = '';
// get and validate data from login form ...
if( array_key_exists('username',$_POST) 
	&& array_key_exists('password',$_POST) ) {

  $user = $_POST['username'];
  $pwd = $_POST['password'];
  $pdo = dbconnect();


  try {
        $sql = ' SELECT password from user ';	  
        $sql .= ' WHERE username = :user ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        $dbUser = $stmt->fetch();

        // Search the user's password from db . . .
        if( $stmt->rowCount() &&
		password_verify($pwd, $dbUser['password']) ) {   
        // correct password
            $_SESSION["expiry"] = time() + 900; // 15 mins
            header('Location: dbstu.php');
            exit();

        } else {    
            $reply = "Incorrect username / password";
        }
        
    } catch(PDOException $e) {
        die($e->getMessage());	  
    }

}
?>
<?=$reply?>
<html>
<head></head>
<body>

<form method="post" action="">
<p>Username: <input type="text" name="username" /></p>
<p>Password: <input type="password" name="password" /></p>
<p><input type="submit" value="Login" /></p>
<p><a href="dbstu.php">Select All Information</a></p>
<!-- <p><a href="frmupdate.php?id=1">Update - Form</a></p> -->
<!-- <p><a href="msgupdate.php?t=1">Update - Result</a></p> -->
</form>
</body>
</html>
