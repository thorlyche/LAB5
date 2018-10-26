<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "t695l633", "ae4aaKi3", "t695l633");

  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  if ($result = $mysqli->query("SELECT * FROM Users"))
  {
    while ($row = $result->fetch_assoc()) {
      printf ("%s \n", $row["user_id"]);
      echo "<br>";
    }
  }
  $mysqli->close();


?>
