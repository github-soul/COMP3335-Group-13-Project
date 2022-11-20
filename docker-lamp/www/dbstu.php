<?php
require_once "./session.inc.php";
require_once "./db.php";
$pdo = dbconnect();

try {
  $sql =  'SELECT General_Information.id, General_Information.Info,  General_Information.Date FROM General_Information ';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

} catch (PDOException $e) {
  die($e->getMessage());
}
?>
<html>
<head></head>
<body>

<h1>Select All Informations</h1>
<?php
$numFound = $stmt->rowCount();
echo "<p>".$numFound." Information(s) found</p>";

if( $numFound > 0 ) {

  echo "<table border='1'>\n";
  echo "<tr>\n";
  echo "<td>ID</td>\n";
  echo "<td>Name</td>\n";
  echo "<td>Date</td>\n";
  //echo "<td>Updated At</td>\n";
  echo "<td>Action</td>\n";
  echo "</tr>\n";

  while( $result = $stmt->fetch() ) {
    echo "<tr>\n";
    echo "<td>".$result['id']."</td>\n";
    echo "<td>".$result['Info']."</td>\n";
    echo "<td>".$result['Date']."</td>\n";
    //echo "<td>".$result['updated_at']."</td>\n";
    echo "<td>";
    echo "<a href='frmupdate.php?id=".$result['id']."'>Update</a> ";
    echo "<a href='dbdelete.php?id=".$result['id']."'>Delete</a>";
    echo "</td>\n";
    echo "</tr>\n";
  }

  echo "</table>\n";
}
?>
<p><a href="frminsert.php">Insert Information</a></p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
