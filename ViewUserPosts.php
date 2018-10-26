<?php
$username = $_POST['user'];
echo $username;
echo "'s Posts are:<br>";

$mysqli = new mysqli("mysql.eecs.ku.edu", "t695l633", "ae4aaKi3", "t695l633");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if ($result = $mysqli->query("SELECT * FROM Posts WHERE author_id='$username'"))
{
  while ($row = $result->fetch_assoc()) {
    printf ("%s \n", $row["content"]);
    echo "<br>";
  }
}
$mysqli->close();
?>
